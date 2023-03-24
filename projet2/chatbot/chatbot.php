<!DOCTYPE html>
<html>
    <head>
        <title>Essai</title>
        <link rel="stylesheet" href="http://localhost/bootstrap-4.6.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/projet%20web2/chatbot/chatbot.css">
    </head>
    <body>
        <div class="chat-bar-collapsible">
            <button id="chat-button" type="button" class="collapsible">Chat with us!
                <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
            </button>
    
            <div class="content">
                <div class="full-chat-block">
                    <!-- Message Container -->
                    <div class="outer-container">
                        <div class="chat-container">
                            <!-- Messages -->
                            <div id="chatbox">
                                <h5 id="chat-timestamp"></h5>
                                <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                            </div>
    
                            <!-- User input box -->
                            <div class="chat-bar-input-block">
                                <div id="userInput">
                                    <input id="textInput" class="input-box" type="text" name="msg"
                                        placeholder="Tap 'Enter' to send a message">
                                    <p></p>
                                </div>
    
                                <div class="chat-bar-icons">
                                    <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                        onclick="heartButton()"></i>
                                    <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                        onclick="sendButton()"></i>
                                </div>
                            </div>
    
                            <div id="chat-bar-bottom">
                                <p></p>
                            </div>
    
                        </div>
                    </div>
    
                </div>
            </div>
    
        </div>
    
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!--jQuery -->
    <script src="http://localhost/projet%20web2/chatbot/chatbot.js"></script>
    <script src="http://localhost/projet%20web2/chatbot/responses.js"></script>
    </body>
</html>