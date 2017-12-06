<?php
App::uses('AppController', 'Controller');
class MembershipsController extends AppController {
    /////////////////////////////////////////
    public $components = array(
        'RequestHandler',
        'Paginator',
        'Flash'
    );
    
    /////////////////////////////////////////
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->layout = "admin";
    }
    
    /*
     * Admin Functions
     */
    
    public function admin_index() {
        $this->Paginator = $this->Components->load('Paginator');
        $this->Paginator->settings = array(
            'Membership' => array(
                'recursive' => -1,
                'limit' => 50,
//                'conditions' => $all['conditions'],
                'order' => array(
                    'Membership.title' => 'ASC'
                ),
                'paramType' => 'querystring',
            )
        );
        $products = $this->Paginator->paginate();
        $this->layout = "admin";
        $this->Membership->recursive = 2;
        $this->set('memberships', $this->Paginator->paginate());
    }
    /**
     * 
     * @param type $id
     * @throws NotFoundException
     */
    public function admin_view($id = null) {
        $this->layout = "admin";
        Configure::write("debug", 0);
        if (!$this->Membership->exists($id)) {
            throw new NotFoundException('Invalid Membership');
        }
        
        $membership = $this->Membership->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'Membership.id' => $id
            )
        ));
       
        $this->set(compact('membership'));
    }
    public function admin_add() {
        $this->layout = "admin";
        if ($this->request->is('post')) {
            $this->request->data['Membership']['assoc_themes'] = serialize($this->request->data['Membership']['assocthemes']);
            $this->Membership->create();
            if ($this->Membership->save($this->request->data)) {
                $this->Session->setFlash('The plan has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The plan could not be saved. Please, try again.');
            }
        }
    }
    public function admin_edit($id = null) {
        Configure::write("debug", 2);
        if (!$this->Membership->exists($id)) {
            throw new NotFoundException('Invalid Membership');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Membership']['assoc_themes'] = serialize($this->request->data['Membership']['assocthemes']);
            if ($this->Membership->save($this->request->data)) {
                $this->Session->setFlash('The product has been saved');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The product could not be saved. Please, try again.');
            }
        }
        $membership = $this->Membership->find('first', array(
            'conditions' => array(
                'Membership.id' => $id
            )
        ));

        $this->request->data = $membership;
        $this->set(compact('membership'));
    }
    public function admin_delete($id = null) {
        $this->Membership->id = $id;
        if (!$this->Membership->exists()) {
            throw new NotFoundException('Invalid Membership');
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Membership->delete()) {
            $this->Session->setFlash('Membership deleted');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Membership was not deleted');
        return $this->redirect(array('action' => 'index'));
    }
    public function admin_switch_active($id=NULL,$status=0){
        $this->layout = "admin";
        $this->Membership->id = $id;
        if (!$this->Membership->exists()) {
            throw new NotFoundException('Invalid Request');
        }
        if($status == 0){
            $updated = 1;
        }else{
            $updated = 0;
        }
        if ($this->Membership->saveField('active', $updated)) {
            $this->Session->setFlash('Status Updated');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('Status was not Updated');
        return $this->redirect(array('action' => 'index'));   
    }
}
?>