<nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="dashboard.php">Cardio</a>
                </h1>
                <span>C</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">
                
            <?php
                if($_SESSION['usertype']=='Admin'){?>
                <li class="">
                    <a href="dashboard.php">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="admin-profile.php">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-user-md"></i>
                        Doctors
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="add-doctor.php">Add Doctors</a>
                        </li>
                        <li>
                            <a href="view-doctor.php">View Doctors</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-user-plus"></i>
                        Patient
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a href="add-patient.php">Add Patient</a>
                        </li>
                        <li>
                            <a href="view-patient.php">View Patient</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu11" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-thermometer-full"></i>
                        Symptoms
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu11">
                        <li>
                            <a href="add-symptoms.php">Add Symptoms</a>
                        </li>
                        <li>
                            <a href="view-symptoms.php">View Symptoms</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="view-echo.php">
                        <i class="fas fa-file"></i>
                        ECHO Report
                    </a>
                </li>
                <li>
                    <a href="view-ecg.php">
                        <i class="fas fa-file"></i>
                        ECG Report
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        <i class="fas fa-file"></i>
                        TMT Report
                    </a>
                </li> -->
                <?php
                }
                else if($_SESSION['usertype']=='Patient'){?>
                <li class="">
                    <a href="">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="patient-profile.php">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a href="view-ecg-user.php">
                        <i class="fas fa-heartbeat"></i>
                        ECG
                    </a>
                </li>
                <!-- <li>
                    <a href="">
                        <i class="fas fa-heartbeat"></i>
                        TMT
                    </a>
                </li> -->
                <li>
                    <a href="view-echo-user.php">
                        <i class="fas fa-heartbeat"></i>
                        ECHO
                    </a>
                </li>

                <li>
                    <a href="view-user-medication.php">
                        <i class="fas fa-plus"></i>
                        Medication
                    </a>
                </li>

                <?php
                }
                else if($_SESSION['usertype']=='Doctor'){?>
                <li class="">
                    <a href="dashboard.php">
                        <i class="fas fa-th-large"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="doctor-profile.php">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a href="#homeSubmenu111" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-thermometer-full"></i>
                        Patient Symptoms
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu111">
                        <li>
                            <a href="add-patient-symptoms.php">Add Symptoms</a>
                        </li>
                        <li>
                            <a href="view-patient-symptoms.php">View Symptoms</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu1111" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-plus"></i>
                        Medication
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1111">
                        <li>
                            <a href="add-medication.php">Add Medication</a>
                        </li>
                        <li>
                            <a href="view-medication.php">View Medication</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="add-ecg.php">
                        <i class="fas fa-heartbeat"></i>
                        ECG
                    </a>
                </li>
                <!-- <li>
                    <a href="add-echo.php">
                        <i class="fas fa-heartbeat"></i>
                        TMT
                    </a>
                </li> -->
                <li>
                    <a href="add-echo.php">
                        <i class="fas fa-heartbeat"></i>
                        ECHO
                    </a>
                </li>
                <?php
                }
            ?>

                
            <li>
                <a href="settings.php">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fas fa-power-off"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>