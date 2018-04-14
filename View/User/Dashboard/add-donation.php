<div class="container">

    <div class="row" id="dash-header">
        <div class="u-full-width">
            <div class="content">
                <h4 class="u-full-width">Donations - Add</h4>
                <div id="notif-zone">
                    <a class="button" href="index.php?p=dashboard&v=donations">Donations List</a>
                </div>
            </div><hr>
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="unit">What amount of blood do you want to donate (in bottle) : </label>
        </div>
        <div class="five columns">
            <input type="number" id="unit" name="unit" min="1" value="1">
        </div>
    </div>

    <div class="row" id="select-title">
        <h5>Select hospital</h5>
    </div>

    <div class="row">

        <table class="u-full-width">
            <thead>
                <tr>
                    <th>Hospital Name</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $type='donations'; require_once 'Controller/Hospital/hospital.php'; ?>
            </tbody>
        </table>

    </div>

</div>