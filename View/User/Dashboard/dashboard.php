<div class="container">

    <div class="row" id="dash-header">
        <div class="u-full-width">
            <div class="content">
                <h4>Dashboard</h4>
                <div id="notif-zone">
                    <a href=""><i class="now-ui-icons ui-1_email-85" id="notif-msg"></i></a>
                </div>
            </div><hr>
        </div>
        <div class="seven columns"></div>
    </div>

    <div class="row">

       <div class="four columns">
           <div class="dashboard-item" id="item1">
               <div class="row">
                <img src="View/assets/images/dash_icons/donation.png" alt="kalel">
                </div>
                <div class="row">
                <h5 class="item-title">Donations</h5>
                </div>
            </div>
       </div>

       <div class="four columns">
           <div class="dashboard-item" id="item2">
                <img src="View/assets/images/dash_icons/request.png" alt="kalel">
                <h5 class="item-title">Requests</h5>
            </div>
       </div>

       <div class="four columns">
           <div class="dashboard-item" id="item3">
                <img src="View/assets/images/dash_icons/info.png" alt="kalel">
                <h5 class="item-title">Informations</h5>
            </div>
       </div>

    </div>

    <div class="row" id="request-row">

        <div class="u-full-width" id="search-section">
            <h5>Hospitals requests</h5>
            <div class="search-box">
            </div>
        </div>

        <hr>
        <table class="u-full-width">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Hospital</th>
                    <th>Blood Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'Controller/hospital_request.php'; ?>
            </tbody>
        </table>

    </div>

</div>