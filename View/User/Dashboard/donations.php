<div class="container">

    <div class="row" id="dash-header">
        <div class="u-full-width">
            <div class="content">
                <h4>Donations</h4>
                <div id="notif-zone">
                    <a class="button" href="index.php?p=dashboard&v=add-donation">Add Donation</a>
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
                    <th>Expiration Date</th>
                    <th>Units</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'Controller/Donation/GetDonations.php'; ?>
            </tbody>
        </table>

    </div>

</div>