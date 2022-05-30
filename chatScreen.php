<?php
//load chat
include "./include/dbconnect.php";
session_start();
extract($_POST);
$user_id = $_SESSION['userId'];
$sql = "SELECT DATE_FORMAT(date_time,'%d %M  %Y') AS date, TIME_FORMAT(date_time, '%h:%i %p') AS time,chat_id,sender_id,sender_name,receiver_id,receiver_name,chat_text FROM `tbl_chats` WHERE (sender_id='$chatId' OR receiver_id='$chatId') AND (sender_id='$user_id' OR receiver_id='$user_id') ORDER BY date_time";
$result = mysqli_query($connect, $sql);
echo '
<div class="px-4 py-5 my-4 chat-box bg-white">
        <div class="chat-card-header">
            <h1 class="content-heading" id="chatUserName">' . $uname . '</h1>
            <div>
                <label for="imageUpload" class="add-task-btn"><img src="./assets/icons/image-ico.svg" alt=""></label>
                <input type="file" name="file" id="imageUpload" accept="image/*" style="display:none; margin:0;">

                <label for="attachmentUpload" class="add-task-btn"><img src="./assets/icons/paper-clip.svg" alt=""></label>
                <input type="file" name="file" id="attachmentUpload" accept=".pdf , .docx , .pptx , .doc , .ppt , .xlsx , .xls , .txt , .csv" style="display:none; margin:0;">
            </div>
        </div>
        <div style="height: 50vh; overflow:auto;" id="cardBody">

';


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $chat_id = $row['chat_id'];
        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $receiver_id = $row['receiver_id'];
        $receiver_name = $row['receiver_name'];
        $date = $row['date'];
        $time = $row['time'];
        $chat_text = $row['chat_text'];

        if ($user_id != $sender_id) {
            if ($chat_text != NULL) {

                echo '

                <div class="media w-50 mb-3"><img src="https://bootstrapious.com/i/snippets/sn-chat/avatar.svg" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            ' . $chat_text . '
                        </div>
                        <p class="small text-muted">' . $date . ', ' . $time . '</p>
                    </div>
                </div>
                
                ';
            }
        } else {
            if ($chat_text != NULL) { {
                    echo '
                <div class="media w-50 ml-auto mb-3">
                    <div class="media-body">
                      <div class="bg-primary rounded py-2 px-3 mb-2">
                        ' . $chat_text . '
                        </div>
                        <p class="small text-muted">' . $date . ', ' . $time . '</p>
                    </div>
                </div>
                
                ';
                }
            }
        }
    }
}

echo '
        </div>
            <form action="#" class="bg-white">
            <div class="input-group">
                <input type="hidden" id="chatUserId" value="' . $chatId . '">
                <input type="text" name="chatInput" id="chatInput" class="form-control rounded-0 border-0 py-4 bg-light" placeholder="Type here..." aria-describedby="addChatBtn" autocomplete="off">
                <div class="input-group-append">
                    <button id="addChatBtn" name="addChatBtn" type="button" class="btn btn-primary saveBtn">></button>
                </div>
                </div>
            </form>
        </div>
        
        ';


?>






<script>
    //send message
    $("#addChatBtn").click(function() {
        var chatInput = $("#chatInput").val();
        var chatUserId = $("#chatUserId").val();
        var chatUserName = $("#chatUserName").text();
        if (chatInput != "") {
            $.ajax({
                url: "./addChat.php",
                type: "POST",
                data: {
                    chatInput: chatInput,
                    chatUserId: chatUserId,
                    chatUserName: chatUserName
                },
                success: function(data) {
                    $("#chatInput").val("");
                    $("#cardBody").append(data);
                    $("#chatList").load("./chatList.php");
                }
            });
        } else {
            alert("empty");
        }
    });
</script>