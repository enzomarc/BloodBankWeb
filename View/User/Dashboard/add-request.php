<div class="container">

    <span class="user-bg" id="<?= Auth::GetBloodGroup(); ?>"></span>

    <div class="row" id="dash-header">
        <div class="u-full-width">
            <div class="content">
                <h4 class="u-full-width">Requests - Request Blood</h4>
                <div id="notif-zone">
                    <a class="button" href="index.php?p=dashboard&v=requests">Requests List</a>
                </div>
            </div><hr>
        </div>
    </div>

    <div class="row">
        <div class="six columns">
            <label for="unit">What amount of blood do you need (in bottle) : </label>
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <input type="number" id="unit" name="unit" min="1" value="1">
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <a class="button" id="search-request-btn" href="#">Search</a>            
        </div>
    </div>

    <div class="row" id="searching-label" style="display: none">
        <div class="u-full-width">
            <p>Searching ...</p>
        </div>
    </div>

    <div class="row" id="select-title" style="display: none">
        <h5>Results</h5>
    </div>

    <div class="row" id="result-table" style="display: none">

        <table class="u-full-width">
            <thead>
                <tr>
                    <th>Hospital Name</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

    </div>

</div>