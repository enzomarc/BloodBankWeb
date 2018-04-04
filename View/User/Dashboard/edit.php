<?php
    require_once 'Controller/User/dashboard.php';
?>

<div class="container">

    <form action="Controller/User/edit.php" method="post" id="edit-form" enctype="multipart/form-data">

        <div class="row" id="header">

            <div class="u-full-width">
                <h4>Edit your profile</h4>
                <hr>
            </div>

        </div>

        <div class="u-full-width" id="pic-section">

            <img id="oavatar" src="View/assets/images/pp/<?= $avatar; ?>" alt="avatar"><br>
            <input type="file" id="img-file" name="img-file" accept="image/*" style="display: none;">
            <a href="#" class="button" id="upload-btn">Edit profile picture</a>

        </div>

        <div class="row section-header">
            <h5>Informations</h5><hr>
        </div>

        <div class="row">

            <input class="u-full-width" type="text" name="username" placeholder="What's your name ? *" value="<?= $username; ?>">
            <input class="u-full-width" type="tel" name="phone" maxlength = 9 placeholder="What's your phone number ? *" value="<?= $phone; ?>">

            <div class="row">
                <div class="six columns">
                    <input class="u-full-width" name="birthdate" type="date" max=<?= $date; ?> placeholder="What's your date of birth ?" value="<?= $birthdate; ?>">
                </div>
                <div class="six columns">
                    <select class="u-full-width" id="gender" name="gender" value="<?= $gender; ?>">
                        <option id="empty" value="">Choose a genre *</option>
                        <option id="man" value="man">Man</option>
                        <option id="woman" value="woman">Woman</option>
                        <option id="other" value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="six columns">
                    <select class="u-full-width" id="bloodgroup" name="bloodgroup" value="<?= $bloodgroup; ?>">
                        <option id="empty" value="">Blood Group *</option>
                        <option id="ap" value="ap">Group A+</option>
                        <option id="am" value="am">Group A-</option>
                        <option id="bp" value="bp">Group B+</option>
                        <option id="bm" value="bm">Group B-</option>
                        <option id="abp" value="abp">Group AB+</option>
                        <option id="abm" value="abm">Group AB-</option>
                        <option id="op" value="op">Group O+</option>
                        <option id="om" value="om">Group O-</option>
                    </select>
                </div>
                <div class="six columns">
                    <select class="u-full-width" id="city" name="city" value="<?= $city; ?>">
                        <option id="empty" value="">City *</option>
                        <option id="yaounde" value="yaounde">Yaoundé</option>
                        <option id="douala" value="douala">Douala</option>
                        <option id="bafoussam" value="bafoussam">Bafoussam</option>
                        <option id="maroua" value="maroua">Maroua</option>
                        <option id="ngaoundere" value="ngaoundere">Ngaoundéré</option>
                        <option id="garoua" value="garoua">Garoua</option>
                        <option id="buea" value="buea">Buea</option>
                        <option id="bamenda" value="bamenda">Bamenda</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="row section-header">
            <h5>Password</h5><hr>
        </div>

        <div class="row">

            <input class="u-full-width" type="password" name="prev-password" placeholder="Current password ...">
            <input class="u-full-width" type="password" name="new-password" placeholder="New password ...">
            <input class="u-full-width" type="password" name="retyped-password" placeholder="Re-type the new password ...">

        </div>

        <div class="row bottom-section">

            <div class="u-full-width" style="text-align: right">
                <div class="content">
                    <p>All fields marked with * are required</p>
                    <div class="button-div">
                        <a class="button" id="edit-button" href="#">SAVE</a>
                    </div
                </div>
            </div>

        </div>

    </form>

    </div>

</div>