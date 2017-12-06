<section class="admin_main-sec">
    <div class="sec_inner">
        <div class="row">
            <div class="col-md-12">
                <div class="page-headeing">
                    <h1 class="page-title"><i class="fa fa-bars" aria-hidden="true"></i>View Unavailable date</h1>
                </div>
            </div>
            <div class="page_content">
                <div class="col-sm-5">
                    <div class="restaurants index">
                        <table class="table-striped table-bordered table-condensed table-hover">
                            <tr>
                                <th>Id</th>
                                <td><?php echo h($UnavailableDate['UnavailableDate']['id']); ?></td>
                            </tr>
                            <tr>
                                <th>Store Name</th>
                                <td><?php echo h($UnavailableDate['Restaurants']['name']); ?></td>
                            </tr>
                            <tr>
                                <th>Unavailable Date</th>
                                <td><?php echo h($UnavailableDate['UnavailableDate']['unavailabledate']); ?></td>
                            </tr>
                           
                            <tr>
                                <th>Created</th>
                                <td><?php echo h($UnavailableDate['UnavailableDate']['created']); ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>