<?php

/**
 * 
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class AddrestaurantsController extends AppController {

////////////////////////////////////////////////////////////
    public function beforeFilter() {
        parent::beforeFilter();
    }

////////////////////////////////////////////////////////////
    public function admin_resadd() {
        Configure::write("debug", 0);
        $this->loadModel('User');
        if ($this->request->is('post')) {
            // debug($this->request->data);exit;
            /*if ($this->User->hasAny(array('User.username' => $this->request->data['User']['username']))) {
                $this->Session->setFlash(__('Username already exist!!!'));
                return $this->redirect(array('action' => 'resadd'));
            }*/
            $this->User->create();
            $this->request->data['User']['email']=$this->request->data['User']['username'];
            $resname = $this->request->data['User']['name'];
            if ($this->User->save($this->request->data)) {
            $l = new CakeEmail('smtp');
            $ms="Welcome !Your Username & password we mentioned below <br/>";
            $ms.="Username:".$this->request->data['User']['username']."<br/>";
            $ms.="Password:".$this->request->data['User']['password']."<br/>";
            $ms.="Restaurant Name:".$this->request->data['User']['name']."<br/>";
           $l->emailFormat('html')->template('default', 'default')->subject('Welcome To register to our store')
                   ->to($this->request->data['User']['username'])->send($ms);
           $this->set('smtp_errors', "none");
           
                $this->loadModel('Restaurant');
                $uid = $this->User->getLastInsertID();
                $this->request->data['Restaurant']['status'] = 1;
                $this->request->data['Restaurant']['taxes'] = 0;
                $this->request->data['Restaurant']['user_id'] = $uid;
                $resname = $this->request->data['Restaurant']['name'] = $resname;
                if ($this->Restaurant->save($this->request->data)) {
                    $id = $this->Restaurant->getLastInsertID();
                    $this->loadModel('Tax');
                    $this->request->data['Tax']['tax'] = 0;
                    $this->request->data['Tax']['resid'] = $id;
                    if ($this->Tax->save($this->request->data)) {
                        return $this->redirect(array('controller' => 'restaurants', 'action' => 'edit/' . $id . '/' . $uid));
                    } else {
                        return $this->redirect(array('action' => 'resadd'));
                    }
                }
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        }
    }

}
