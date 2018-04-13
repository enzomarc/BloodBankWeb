<div class="container">

    <div class="row" id="dash-header">
        <div class="u-full-width">
            <div class="content">
                <h4>Requests</h4>
                <div id="notif-zone">
                    <a href=""><i class="now-ui-icons ui-1_email-85" id="notif-msg"></i></a>
                </div>
            </div><hr>
        </div>
    </div>

    <div class="row">

        <table class="u-full-width">
            <thead>
                <tr>
                    <th>Hospital</th>
                    <th>Date</th>
                    <th>Received Date</th>
                    <th>Units</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'Controller/hospital_request.php'; ?>
            </tbody>
        </table>

    </div>

</div>