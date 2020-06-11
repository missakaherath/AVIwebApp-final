<?php
require_once('DBController.php');
require_once('config.php');
require_once('utilityManager.php');
require_once('initialize.php');
require_once('logger.php');
?>

    <?php
    if (isset($_POST['login_admin'])) {
        $manager->loginAdmin();
    }
    // elseif (isset($_SESSION['set'])) {
    // seller functionalities
    elseif (isset($_POST['add_admin'])) {
        $manager->addAdmin();
    } elseif (isset($_POST['add_general_user'])) {
        $manager->addGeneralUser();
    } elseif (isset($_POST['remove_admin'])) {
        $manager->removeAdmin();
    } elseif (isset($_POST['remove_G_user'])) {
        $manager->removeGeneralUser();
    } elseif (isset($_POST['remove_blacklisted'])) {
        $manager->removeBlockedVehicle();
    } elseif (isset($_POST['edit_admin'])) {
        $manager->editAdmin();
    } elseif (isset($_POST['edit_G_user'])) {
        $manager->editGeneralUser();
    } elseif (isset($_POST['update_admin'])) {
        $manager->updateAdmin();
    } elseif (isset($_POST['update_G_user'])) {
        $manager->updateGeneralUser();
    } elseif (isset($_POST['submit-search'])) {
        $manager->searchVehicles();
    } elseif (isset($_POST['submit-released-search'])) {
        $manager->searchReleased();
    } elseif (isset($_POST['submit-admin-search'])) {
        $manager->searchAdmin();
    } elseif (isset($_POST['submit-general-search'])) {
        $manager->searchGenUsers();
    }

    class manager
    {
        private static $sessions = array();

        public static function getInstance($key)
        {
            if (!array_key_exists($key, self::$sessions)) {
                self::$sessions[$key] = new self();
            }
            return self::$sessions[$key];
        }

        private function __construct()
        {
        }

        private function __clone()
        {
        }
        //return the list of items of the seller

        public function addAdmin()
        {
            $name = $_POST['fullName'];
            $regNo = $_POST['regNo'];
            $username = $_POST['username'];
            $branch = $_POST['branch'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $utility = new utility();
            $isSuccess = $utility->addAdmin($name, $regNo, $username, $branch, $password);
            if ($isSuccess) {
                $this->getAdminList();
                header("Location:../viewAdminList.php");
            }
        }

        public function addGeneralUser()
        {
            $name = $_POST['fullName'];
            $regNo = $_POST['regNo'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $branch = $_POST['branch'];
            $username = $_POST['username'];
            $utility = new utility();
            $isSuccess = $utility->addGeneralUser($name, $regNo, $username, $branch, $password);
            if ($isSuccess) {
                $this->getUserList();
                header("Location:../viewGeneralUserList.php");
            }
        }

        public function loginAdmin()
        {
            $psw = $_POST['password'];
            $uname = $_POST['username'];
            $this->myLogger = new admin($psw, $uname);
            $result = $this->myLogger->loginAdmin();
            if ($result) {
                $_SESSION['set'] = "set";
                // session_start();
                // $_SESSION['userLoggedIn'] = "true";
                $this->isAdmin = true;
                $this->getAdminList();
                $this->getUserList();
                $this->getBlacklistedVehicleList();
                $this->getReleasedVehicles();
                //$this->gettotalsellerList();
                //$this->gettotalitemList();
                header("Location:../homePage.php");
            } else {
                $_SESSION['pwd'] = false;
                header("Location:../login.php");
                // echo "something went wrong.Please try again";
            }
        }

        public function getAdminList()
        {
            $utility = new utility();
            $adminList = $utility->getAdminList();
            if ($adminList) {
                $_SESSION['adminList'] = $adminList;
            }
        }

        public function getBlacklistedVehicleList()
        {
            $utility = new utility();
            $blacklistedList = $utility->getBlackListedVehicleList();
            if ($blacklistedList) {
                $_SESSION['blacklistedList'] = $blacklistedList;
            }
        }

        public function getReleasedVehicles()
        {
            $utility = new utility();
            $releasedList = $utility->getReleasedVehicleList();
            if ($releasedList) {
                $_SESSION['releasedList'] = $releasedList;
            } else {
                $_SESSION['releasedList'] = "";
            }
        }

        public function getUserList()
        {
            $utility = new utility();
            $userList = $utility->getUserList();
            if ($userList) {
                $_SESSION['userList'] = $userList;
            }
        }
        public function searchVehicles()
        {
            $number = $_POST['search'];
            $minlength = 1;
            if (strlen($number) >= $minlength) {
                $utility = new utility();
                $searched = $utility->getSearchedVehicles($number);
            }
            if ($searched) {
                $_SESSION['searchedVehicles'] = $searched;
                header("Location:../search.php");
            } else {
                $_SESSION['searchedVehicles'] = [];
                header("Location:../search.php");
            }
        }
        public function searchAdmin()
        {
            $name = $_POST['search'];
            $utility = new utility();
            $searched = $utility->getSearchedAdmins($name);
            if ($searched) {
                $_SESSION['searchedAdmins'] = $searched;
                header("Location:../searchAdmins.php");
            } else {
                $_SESSION['searchedAdmins'] = [];
                header("Location:../searchAdmins.php");
            }
        }
        public function searchGenUsers()
        {
            $name = $_POST['search'];
            $utility = new utility();
            $searched = $utility->getSearchedGenUsers($name);
            if ($searched) {
                $_SESSION['searchedGenUsers'] = $searched;
                header("Location:../searchGenUsers.php");
            } else {
                $_SESSION['searchedGenUsers'] = [];
                header("Location:../searchGenUsers.php");
            }
        }
        public function searchReleased()
        {
            $number = $_POST['search'];
            $minlength = 1;
            if (strlen($number) >= $minlength) {
                $utility = new utility();
                $searched = $utility->getReleasedVehiclesSearch($number);
            }
            if ($searched) {
                $_SESSION['searchedReleasedVehicles'] = $searched;
                header("Location:../searchReleased.php");
            } else {
                $_SESSION['searchedReleasedVehicles'] = [];
                header("Location:../searchReleased.php");
            }
        }

        public function removeAdmin()
        {
            $utility = new utility();
            $isRemoved = $utility->RemoveAdmin($_POST['remove_admin']);
            if ($isRemoved) {
                $this->getAdminList();
                header("Location:../viewAdminList.php");
            }
        }

        public function removeGeneralUser()
        {
            $utility = new utility();
            $isRemoved = $utility->RemoveUser($_POST['remove_G_user']);
            if ($isRemoved) {
                $this->getUserList();
                header("Location:../viewGeneralUserList.php");
            }
        }

        public function removeBlockedVehicle()
        {
            $utility = new utility();
            $isRemoved = $utility->removeBlocked($_POST['remove_blacklisted']);
            if ($isRemoved) {
                $this->getBlacklistedVehicleList();
                $this->getReleasedVehicles();
                header("Location:../viewReleasedVehicles.php");
            }
        }

        public function editAdmin()
        {
            $utility = new utility();
            $admin = $utility->EditAdmin($_POST['edit_admin']);
            if ($admin) {
                $_SESSION['current_admin_to_change'] = $admin;
                header("Location:../updateAdminDetails.php");
            }
        }

        public function editGeneralUser()
        {
            $utility = new utility();
            $user = $utility->EditUser($_POST['edit_G_user']);
            if ($user) {
                $_SESSION['current_user_to_change'] = $user;
                header("Location:../updateUserDetails.php");
            }
        }

        public function updateAdmin()
        {
            // echo "sasa";
            $name = $_POST['fullName'];
            $regNo = $_POST['regNo'];
            // $branch = $_POST['branch'];
            $branchID = $_POST['branchID'];
            $username = $_POST['username'];
            $id = $_POST['id'];
            $utility = new utility();
            $updated = $utility->UpdateAdmin($name, $regNo, $username, $branchID, $id);
            if ($updated) {
                $this->getAdminList();
                header("Location:../viewAdminList.php");
            }
        }

        public function updateGeneralUser()
        {
            $name = $_POST['fullName'];
            $regNo = $_POST['regNo'];
            // $branch = $_POST['branch'];
            $branchID = $_POST['branchID'];
            $username = $_POST['username'];
            $id = $_POST['id'];
            $utility = new utility();
            $updated = $utility->UpdateUser($name, $regNo, $username, $branchID, $id);
            if ($updated) {
                $this->getUserList();
                header("Location:../viewGeneralUserList.php");
            }
        }
    }
    ?>