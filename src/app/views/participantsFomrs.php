<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.761723296044!2d-118.3458722847837!3d34.10124408059264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2s7060%20Hollywood%20Blvd%2C%20Los%20Angeles%2C%20CA%2090028%2C%20USA!5e0!3m2!1sen!2sua!4v1574234473374!5m2!1sen!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>

<div class="container">
    <div id="firstForm" class="col-md-6 offset-md-3 form">
        <div class="text-center">
            <h4><?= TITLE ?></h4>
            <a href="./ControllerParticipants/ShowAllMembers">All members (<?= $userCount ?>)</a>
        </div>
        <form method="POST" action="./ControllerParticipants/Register">

            <div class="form-group">
                <label for="inputFirstName" class="ml-1">Firstname <small style="color: red;">*</small></label>
                <input id="inputFirstName" class="form-control" type="text" name="firstname" placeholder="Enter your Firstname">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputLastName" class="ml-1">Lastname <small style="color: red;">*</small></label>
                <input id="inputLastName" class="form-control" type="text" name="lastname" placeholder="Enter your Lastname">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputBirthDate" class="ml-1">Birth Date <small style="color: red;">*</small></label>
                <input id="inputBirthDate" class="form-control" type="text" name="birthdate" placeholder="Enter your Birth Date">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputReportSubject" class="ml-1">Report Subject <small style="color: red;">*</small></label>
                <input id="inputReportSubject" class="form-control" type="text" name="reportsubject" placeholder="Enter your Report Subject">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputCountry" class="ml-1">Country <small style="color: red;">*</small></label>
                <input id="inputCountry" class="form-control" type="text" name="country" placeholder="Choose your Country">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputPhone" class="ml-1">Phone <small style="color: red;">*</small></label>
                <input id="inputPhone" class="form-control" type="text" name="phone">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="ml-1">Email <small style="color: red;">*</small></label>
                <input id="inputEmail" class="form-control" type="email" name="email" placeholder="Enter your Email">
                <small class="error ml-1"></small>
            </div>

            <div class="text-right">
                <button class="btn btn-primary" type="submit" name="submit">Next</button>
            </div>

        </form>
    </div>

    <div id="secondForm" class="col-md-6 offset-md-3 form">
        <div class="text-center">
            <a href="./ControllerParticipants/ShowAllMembers">All members (<label class="userCount"></label>)</a>
        </div>
        <form action="POST" action="./ControllerParticipants/Overwrite">

            <div class="form-group">
                <label for="inputCompany" class="ml-1">Company</label>
                <input id="inputCompany" class="form-control" type="text" name="company" placeholder="Enter your Company">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputPosition" class="ml-1">Position</label>
                <input id="inputPosition" class="form-control" type="text" name="position" placeholder="Enter your Position">
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputAboutMe" class="ml-1">About Me</label>
                <textarea id="inputAboutMe" class="form-control" type="text" name="aboutme" placeholder="Write some about yourself" rows="3" style="resize: none;"></textarea>
                <small class="error ml-1"></small>
            </div>

            <div class="form-group">
                <label for="inputPhoto" class="ml-1">Photo</label>
                <input id="inputPhoto" class="form-control" type="file" name="photo" accept="image/gif, image/png, image/jpeg">
                <small class="error ml-1"></small>
            </div>

            <div class="text-right">
                <button class="btn btn-primary" type="submit" name="submit">Next</button>
            </div>

        </form>
    </div>

    <div id="shareForm" class="col-md-6 offset-md-3 form">
        <div class="text-center">
            <h4>Share</h4>
            <a href="./ControllerParticipants/ShowAllMembers">All members (<label class="userCount"></label>)</a>
        </div>
        <div class="mt-2">
            <a target="_blank" class="btn btn-lg btn-block" href="https://www.facebook.com/sharer.php?u=<?= $url ?>" style="background-color: #3b5998; color: #fff">Facebook</a>
            <a target="_blank" class="btn btn-lg btn-block" href="https://twitter.com/intent/tweet?text=<?= TW_TEXT ?> URL:<?= $url ?>" style="background-color: #00acee; color: #fff">Twitter</a>
        </div>
    </div>
</div>

<script src="./js/formValidator.js"></script>
<script src="./js/firstForm.js"></script>
<script src="./js/secondForm.js"></script>