<section class="contact_section">
    <div class="container">
        <div class="conatiner_box">
            <div class="row justify-content-lg-between">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <form action="/api/assessment" method="POST" class="form-group">
                        @csrf
                        <!-- Personal Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Personal Information:</h4>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your full name" required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact Number:</label>
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        placeholder="Enter your contact number" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email address" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="emergency_contact">Emergency Contact:</label>
                                    <input type="tel" class="form-control" id="emergency_contact"
                                        name="emergency_contact" placeholder="Enter emergency contact number" required>
                                </div>
                            </div>
                            <!-- Reason for Visit -->
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Reason for Visit:</h4>
                                <div class="form-group">
                                    <label for="visit_reason">What brings you here today?</label>
                                    <textarea class="form-control" id="visit_reason" name="visit_reason" rows="3"
                                        placeholder="Describe your reason for visiting" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Medical History -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Medical History:</h4>
                                <div class="form-group">
                                    <label for="past_injuries">Any past injuries or surgeries?</label>
                                    <textarea class="form-control" id="past_injuries" name="past_injuries" rows="3"
                                        placeholder="Describe any past injuries or surgeries"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="medical_issues">Any ongoing medical issues?</label>
                                    <textarea class="form-control" id="medical_issues" name="medical_issues" rows="3"
                                        placeholder="Describe any ongoing medical issues"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="medications">List any medications you take:</label>
                                    <textarea class="form-control" id="medications" name="medications" rows="3"
                                        placeholder="List any medications you are currently taking"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="allergies">Do you have any allergies?</label>
                                    <textarea class="form-control" id="allergies" name="allergies" rows="3" placeholder="List any allergies you have"></textarea>
                                </div>
                            </div>
                            <!-- Current Symptoms -->
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Current Symptoms:</h4>
                                <div class="form-group">
                                    <label for="pain_location">Where does it hurt?</label>
                                    <textarea class="form-control" id="pain_location" name="pain_location" rows="3"
                                        placeholder="Describe the location of your pain" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pain_intensity">How bad is the pain (on a scale of 1 to
                                        10)?</label>
                                    <input type="number" class="form-control" id="pain_intensity"
                                        name="pain_intensity" placeholder="Enter pain intensity" min="1"
                                        max="10" required>
                                </div>
                                <div class="form-group">
                                    <label for="pain_frequency">How often do you feel this pain?</label>
                                    <input type="text" class="form-control" id="pain_frequency"
                                        name="pain_frequency" placeholder="Enter frequency of pain" required>
                                </div>
                                <div class="form-group">
                                    <label for="pain_triggers">What makes it feel worse?</label>
                                    <textarea class="form-control" id="pain_triggers" name="pain_triggers" rows="3"
                                        placeholder="Describe what makes the pain worse" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pain_relief">What makes it feel better?</label>
                                    <textarea class="form-control" id="pain_relief" name="pain_relief" rows="3"
                                        placeholder="Describe what makes the pain better" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Functional Assessment -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Functional Assessment:</h4>
                                <div class="form-group">
                                    <label for="normal_movement">Can you move normally?</label>
                                    <textarea class="form-control" id="normal_movement" name="normal_movement" rows="3"
                                        placeholder="Describe your ability to move normally" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="strength_balance">Are you feeling strong and balanced?</label>
                                    <textarea class="form-control" id="strength_balance" name="strength_balance" rows="3"
                                        placeholder="Describe your strength and balance" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="everyday_activities">Can you do everyday activities without
                                        trouble?</label>
                                    <textarea class="form-control" id="everyday_activities" name="everyday_activities" rows="3"
                                        placeholder="Describe any difficulties with everyday activities" required></textarea>
                                </div>
                            </div>
                            <!-- Pain Assessment -->
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Pain Assessment:</h4>
                                <div class="form-group">
                                    <label for="pain_intensity2">How bad is your pain (0 to 10)?</label>
                                    <input type="number" class="form-control" id="pain_intensity2"
                                        name="pain_intensity2" placeholder="Enter pain intensity" min="0"
                                        max="10" required>
                                </div>
                                <div class="form-group">
                                    <label for="pain_frequency2">How often do you feel it?</label>
                                    <input type="text" class="form-control" id="pain_frequency2"
                                        name="pain_frequency2" placeholder="Enter frequency of pain" required>
                                </div>
                                <div class="form-group">
                                    <label for="pain_description">What does it feel like?</label>
                                    <textarea class="form-control" id="pain_description" name="pain_description" rows="3"
                                        placeholder="Describe the sensation of your pain" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Level -->
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Activity Level:</h4>
                                <div class="form-group">
                                    <label for="activity_level">How active are you normally?</label>
                                    <textarea class="form-control" id="activity_level" name="activity_level" rows="3"
                                        placeholder="Describe your normal activity level" required></textarea>
                                </div>
                            </div>
                            <!-- Goals -->
                            <div class="col-md-6">
                                <h4 class="ms-3 mb-4">Goals:</h4>
                                <div class="form-group">
                                    <label for="therapy_goals">What do you hope to achieve with
                                        physiotherapy?</label>
                                    <textarea class="form-control" id="therapy_goals" name="therapy_goals" rows="3"
                                        placeholder="Describe your goals for physiotherapy" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Comments -->
                        <h4 class="ms-3 mb-4">Additional Comments:</h4>
                        <div class="form-group">
                            <textarea class="form-control" id="additional_comments" name="additional_comments" rows="3"
                                placeholder="Enter any additional comments"></textarea>
                        </div>

                        <!-- Consent -->
                        <div class="form-check mb-3 ml-3">
                            <input type="checkbox" class="form-check-input" id="consent" name="consent" required>
                            <label class="form-check-label" for="consent">I agree to share this
                                information.</label>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary submit-contact">
                                <span class="btn_text" data-text="Submit">
                                    Submit
                                </span>
                                <span class="btn_icon">
                                    <i class="fa-solid fa-arrow-up-right"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
