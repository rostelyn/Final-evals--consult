@extends('layouts.AdminConsult-layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/notify.css') }}">

    <div class="notification-container">
        <h1>STUDENT EVALUATION AND CONSULTATION</h1>
        <div class="notification-panel">
            <div class="notification-header">
                <button class="compose-btn" id="composeBtn">Compose</button>
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <button class="search-btn">Search</button>
                </div>
                <div class="notification-controls">
                    <button class="refresh-btn" id="refreshBtn" title="Refresh">↻</button>
                    <button class="mark-btn" id="checkAllBtn" title="Check All">✓</button>
                    <button class="delete-btn" title="Delete">🗑</button>
                </div>
                <div class="pagination">
                    1 of 1
                    <button class="prev-btn" title="Previous"><</button>
                    <button class="next-btn" title="Next">></button>
                </div>
            </div>
            <div class="notification-body">
                <div class="notification-sidebar">
                    <div class="inbox active" id="inboxBtn">Inbox</div>
                    <div class="sent" id="sentBtn">Sent</div>
                </div>
                <div class="notification-list" id="notificationList">
                    <!-- Notification items will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>

    <!-- New Message Modal -->
    <div id="newMessageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>New Message</h2>
                <span class="close">&times;</span>
                <button class="expand-btn" title="Expand">⛶</button>
            </div>
            <div class="modal-body">
                <form id="newMessageForm">
                    <div class="form-group">
                        <label for="recipient">Recipient:</label>
                        <input type="text" id="recipient" name="recipient" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="10" required></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="send-btn">Send</button>
                        <button type="button" class="attach-btn" title="Attach file">📎</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Sample data for inbox and sent messages
        const inboxMessages = [
            { recipient: "John Doe", subject: "Meeting Tomorrow", dateTime: "2023-08-29 10:00" },
            { recipient: "Jane Smith", subject: "Project Update", dateTime: "2023-08-28 15:30" },
            { recipient: "Mike Johnson", subject: "Consultation Request", dateTime: "2023-08-27 09:15" },
            { recipient: "Sarah Williams", subject: "Evaluation Results", dateTime: "2023-08-26 14:45" }
        ];

        const sentMessages = [
            { recipient: "Alice Brown", subject: "Feedback on Proposal", dateTime: "2023-08-29 11:30" },
            { recipient: "Bob Wilson", subject: "Schedule Change", dateTime: "2023-08-28 16:00" },
            { recipient: "Carol Davis", subject: "Document Review", dateTime: "2023-08-27 10:45" },
            { recipient: "David Miller", subject: "Appointment Confirmation", dateTime: "2023-08-26 13:15" }
        ];

        function displayMessages(messages) {
            const notificationList = document.getElementById("notificationList");
            notificationList.innerHTML = "";
            messages.forEach(message => {
                const messageElement = document.createElement("div");
                messageElement.className = "notification-item";
                messageElement.innerHTML = `
                    <input type="checkbox" class="notification-checkbox">
                    <span class="recipient">${message.recipient}</span>
                    <span class="subject">${message.subject}</span>
                    <span class="date-time">${message.dateTime}</span>
                `;
                notificationList.appendChild(messageElement);
            });
        }

        // Initial display of inbox messages
        displayMessages(inboxMessages);

        // Inbox button click handler
        document.getElementById("inboxBtn").onclick = function() {
            displayMessages(inboxMessages);
            this.classList.add("active");
            document.getElementById("sentBtn").classList.remove("active");
        };

        // Sent button click handler
        document.getElementById("sentBtn").onclick = function() {
            displayMessages(sentMessages);
            this.classList.add("active");
            document.getElementById("inboxBtn").classList.remove("active");
        };

        // Refresh button click handler
        document.getElementById("refreshBtn").onclick = function() {
            const activeTab = document.querySelector(".notification-sidebar .active");
            if (activeTab.id === "inboxBtn") {
                displayMessages(inboxMessages);
            } else {
                displayMessages(sentMessages);
            }
        };

        // Get the modal
        var modal = document.getElementById("newMessageModal");

        // Get the button that opens the modal
        var btn = document.getElementById("composeBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle form submission (you can customize this part)
        document.getElementById("newMessageForm").onsubmit = function(e) {
            e.preventDefault();
            // Here you can add code to handle the form submission
            alert("Message sent!");
            modal.style.display = "none";
        }

        // Check All functionality
        document.getElementById("checkAllBtn").onclick = function() {
            var checkboxes = document.getElementsByClassName("notification-checkbox");
            var allChecked = true;
            
            // Check if all checkboxes are already checked
            for (var i = 0; i < checkboxes.length; i++) {
                if (!checkboxes[i].checked) {
                    allChecked = false;
                    break;
                }
            }
            
            // Toggle checkboxes based on current state
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = !allChecked;
            }
        }
    </script>
@endsection