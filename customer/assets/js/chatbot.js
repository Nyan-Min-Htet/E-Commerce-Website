const toggleBtn = document.getElementById("chatbot-toggle");
const chatbox = document.getElementById("chatbox");

chatbox.style.display = "none";
chatbox.classList.remove("open");

// Toggle chatbot visibility and save state
toggleBtn.onclick = () => {
  if (chatbox.style.display === "none" || !chatbox.classList.contains("open")) {
    chatbox.style.display = "flex";
    chatbox.classList.add("open");
    localStorage.setItem("chatboxOpen", "true");
  } else {
    chatbox.style.display = "none";
    chatbox.classList.remove("open");
    localStorage.setItem("chatboxOpen", "false");
  }
};

async function sendMessage() {
  const inputField = document.getElementById("user-input");
  const userMessage = inputField.value.trim();
  if (!userMessage) return;

  const chatlog = document.getElementById("chatlog");

  // Create user message element with animation
  const userMsgEl = document.createElement("div");
  userMsgEl.classList.add("user-msg");
  userMsgEl.textContent = `You: ${userMessage}`;
  chatlog.appendChild(userMsgEl);
  inputField.value = ""; // Clear input field
  chatlog.scrollTop = chatlog.scrollHeight;
  setTimeout(() => {
    userMsgEl.classList.add("animate-in");
  }, 10);

  // Add typing indicator
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

    // Remove typing indicator
    typingEl.remove();

    if (data.error) {
      const errorMsgEl = document.createElement("div");
      errorMsgEl.className = "bot-msg";
      errorMsgEl.textContent = `Bot: ${
        data.error.message || "An error occurred."
      }`;
      chatlog.appendChild(errorMsgEl);
      setTimeout(() => {
        errorMsgEl.classList.add("animate-in");
      }, 10);
      chatlog.scrollTop = chatlog.scrollHeight;
      return;
    }

    // Add bot message with HTML support
    const botMsgEl = document.createElement("div");
    botMsgEl.classList.add("bot-msg");
    botMsgEl.innerHTML = `<strong>Bot:</strong> ${data.reply}`;
    chatlog.appendChild(botMsgEl);
    chatlog.scrollTop = chatlog.scrollHeight;
    setTimeout(() => {
      botMsgEl.classList.add("animate-in");
    }, 10);
  } catch (error) {
    typingEl.remove();

    const botErrorEl = document.createElement("div");
    botErrorEl.classList.add("bot-msg", "animate-in");
    botErrorEl.textContent = "Bot: Something went wrong.";
    chatlog.appendChild(botErrorEl);
    chatlog.scrollTop = chatlog.scrollHeight;
  }
}
