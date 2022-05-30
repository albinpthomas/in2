<?php
session_start();
include "./include/dbconnect.php";
if (isset($_SESSION["toGoods"]) != session_id()) {
    header("Location: ./index.php");
    die();
} else {
    $userId = $_SESSION['userId'];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="./assets/css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    </head>

    <body>

        <!--Dashboard contents-->
        <div class="container-fluid p-3">
            <div class="row">
                <!--col 1 start-->
                <!-- Users box-->
                <div class="col-5 ">
                    <div class="chats-card-1">

                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="content-heading">Recent Chats</h1>
                            <button data-toggle='modal' data-target='#newChatModal' class="add-task-btn">New Chat +</button>
                        </div>

                        <div class="messages-box mt-2" id="chatList">

                        </div>
                    </div>
                </div>
                <!--col 1 end-->

                <!--col 2 start-->
                <!-- Chat Box-->
                <div class="col-7 px-0" id="chatScreen">


                </div>
                <!--col 2 end-->
            </div>
        </div>


        <!-- Modal -->
        <div class="modal" tabindex="-1" id="newChatModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <div class="d-flex justify-content-between w-100">
                            <h5 class="modal-title">Let's Talk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="chat-search-box">
                                <input type="text" placeholder="Search" />
                                <div class="modal-body chat-card-body" id="allChat">
                                    <?php

                                    //get all users except current user
                                    $sqlNew = "SELECT `user_id`,`name`,`profile_pic` FROM `tbl_user` WHERE `user_id` != $userId AND `user_status` != 2";
                                    $resultNew = mysqli_query($connect, $sqlNew);
                                    if (mysqli_num_rows($resultNew) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultNew)) {
                                            $userId = $row['user_id'];
                                            $username = $row['name'];
                                            $profile_pic = $row['profile_pic'];

                                            echo '

                                <a class="rounded-card" id="' . $userId . '">
                                    <div class="media"><img src="./assets/uploads/' . $profile_pic . '" alt="user" width="50" height="50" class="rounded-circle">
                                        <div class="media-body ml-4">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="mb-0" id="uname">' . $username . '</h6>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>
                                
                                ';
                                        }
                                    }

                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>


                    <script src="//code.jquery.com/jquery-3.1.1.slim.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
                    </script>
                    <script src="./js/app.js"></script>

                    <script>
                        $(document).ready(function() {
                            $("#chatList").load("./chatList.php");



                            $("#chatList").on("click", "a", function() {
                                $(this).addClass("rounded-card-active");
                                $("#chatList a").not(this).removeClass("rounded-card-active");
                                var chatId = $(this).attr("id");
                                var currentItem = $(this);
                                var uname = currentItem.find("#uname").text();
                                $.post("./chatScreen.php", {
                                    chatId: chatId,
                                    uname: uname
                                }, function(data) {
                                    $("#chatScreen").html(data);
                                });

                            });

                            $("#allChat").on("click", "a", function() {
                                $(this).addClass("rounded-card-active");
                                $("#allChat a").not(this).removeClass("rounded-card-active");
                                var chatId = $(this).attr("id");
                                var currentItem = $(this);
                                var uname = currentItem.find("#uname").text();
                                $.post("./chatScreen.php", {
                                    chatId: chatId,
                                    uname: uname
                                }, function(data) {
                                    $("#newChatModal").modal("hide");
                                    $("#chatScreen").html(data);
                                    $("#chatList").load("./chatList.php");
                                });

                            });
                        });
                    </script>
    </body>

    </html>
<?php
}
?>