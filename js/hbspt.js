if (window.HubSpotConversations) {
    hubspotChatReady();
} else {
    window.hsConversationsOnReady = [hubspotChatReady];
}
function hubspotChatReady() {
    //Proceed to immediately load Live Chat while conversation is persisting
    window.HubSpotConversations.addEventListener("conversationStarted", function () {
        sessionStorage.setItem("chatInProgress", "true");
    });
    window.HubSpotConversations.addEventListener("conversationClosed", function () {
        sessionStorage.removeItem("chatInProgress");
    });
    //Fake Hubspot Live chat button to launch real live chat only when user clicks
    //Ignore if Live Chat is already loaded
    if (window.HubSpotConversations.widget.status().loaded === false) {
        var $liveChat = document.getElementById("activate-chat");
        $liveChat.style.display = "block";
        $liveChat.addEventListener("click", function (event) {
            event.preventDefault();
            $liveChat.classList.add("loading");
            //Chat window is open when the iframe is loaded in the dom (Hubspot doesn't give a callback for the chat window opening)
            var observer = new MutationObserver(function (mutationList, observer) {
                mutationList.forEach(function (m) {
                    m.addedNodes.forEach(function (n) {
                        if (n.id === "hubspot-messages-iframe-container") {
                            n.querySelector('iframe').addEventListener('load', function () {
                                $liveChat.classList.remove("loading");
                                window.HubSpotConversations.widget.open();
                                observer.disconnect();
                            });
                        }
                    });
                });
            });
            observer.observe(document.body, { childList: true, attributes: false, subtree: false });
            window.HubSpotConversations.widget.load({ widgetOpen: true });
        })
    }
}