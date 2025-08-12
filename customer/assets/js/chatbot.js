const toggleBtn = document.getElementById("chatbot-toggle");
const chatbox = document.getElementById("chatbox");

chatbox.style.display = "none";
chatbox.classList.remove("open");

// Restore chatbox state from localStorage
if (localStorage.getItem("chatboxOpen") === "true") {
  chatbox.style.display = "flex";
  chatbox.classList.add("open");
}

// Toggle chatbot visibility
toggleBtn.onclick = () => {
  const isOpen = chatbox.classList.contains("open");
  chatbox.style.display = isOpen ? "none" : "flex";
  chatbox.classList.toggle("open", !isOpen);
  localStorage.setItem("chatboxOpen", !isOpen);
};

async function sendMessage() {
  const inputField = document.getElementById("user-input");
  const userMessage = inputField.value.trim();
  if (!userMessage) return;

  const chatlog = document.getElementById("chatlog");

  // Create user message
  const userMsgEl = document.createElement("div");
  userMsgEl.classList.add("user-msg");
  userMsgEl.textContent = `You: ${userMessage}`;
  chatlog.appendChild(userMsgEl);
  chatlog.scrollTop = chatlog.scrollHeight;
  setTimeout(() => userMsgEl.classList.add("animate-in"), 10);
  inputField.value = "";

  // Typing indicator
  const typingEl = document.createElement("div");
  typingEl.className = "bot-msg typing-indicator";
  typingEl.innerHTML = `<span></span><span></span><span></span>`;
  chatlog.appendChild(typingEl);
  chatlog.scrollTop = chatlog.scrollHeight;

  try {
    const response = await fetch("chatbot.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message: userMessage }),
    });

    const data = await response.json();
    typingEl.remove();

    const botMsgEl = document.createElement("div");
    botMsgEl.classList.add("bot-msg");

    if (data.error) {
      botMsgEl.textContent = `Bot: ${
        data.error.message || "An error occurred."
      }`;
    } else {
      botMsgEl.innerHTML = `<strong>Bot:</strong> ${data.reply}`;
    }

    chatlog.appendChild(botMsgEl);
    chatlog.scrollTop = chatlog.scrollHeight;
    setTimeout(() => botMsgEl.classList.add("animate-in"), 10);
  } catch (error) {
    typingEl.remove();

    const botErrorEl = document.createElement("div");
    botErrorEl.classList.add("bot-msg", "animate-in");
    botErrorEl.textContent = "Bot: Something went wrong. Please try again.";
    chatlog.appendChild(botErrorEl);
    chatlog.scrollTop = chatlog.scrollHeight;
  }
}

// Allow pressing Enter to send message
document.getElementById("user-input").addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey) {
    e.preventDefault();
    sendMessage();
  }
});
