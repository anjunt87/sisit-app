<style>
    .chat-animation {
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .typing-indicator {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #9CA3AF;
        animation: typing 1.4s infinite;
    }

    .typing-indicator:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing-indicator:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes typing {

        0%,
        60%,
        100% {
            transform: translateY(0);
        }

        30% {
            transform: translateY(-10px);
        }
    }

    .pulse-icon {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }
</style>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
            <!-- Kolom 1 -->
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('storage/img/logo-niis-putih.png') }}" data-animate="slide-text" data-delay="200"
                        class="w-40 h-40 object-contain" alt="Logo NIIS">
                </div>
                <div data-animate="slide-text" data-delay="200">
                    <p class="text-gray-400 mb-6">
                        Menjadi lembaga pendidikan rujukan yang membentuk generasi rabbani.
                    </p>
                </div>
                <div class="flex space-x-4" data-animate="slide-text" data-delay="200">
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Kolom 2 -->
            <div>
                <h4 class="text-lg font-bold mb-6" data-animate="slide-text" data-delay="300">Program Pendidikan</h4>
                <ul class="space-y-3 text-gray-400" data-animate="slide-text" data-delay="400">
                    <li><a href="#" class="hover:text-white transition-all">KB/TK Islam Terpadu</a></li>
                    <li><a href="#" class="hover:text-white transition-all">SD Islam Terpadu</a></li>
                    <li><a href="#" class="hover:text-white transition-all">SMP Islam Terpadu</a></li>
                    <li><a href="#" class="hover:text-white transition-all">SMA Islam Terpadu</a></li>
                    <li><a href="#" class="hover:text-white transition-all">Program Tahfidz</a></li>
                </ul>
            </div>

            <!-- Kolom 3 -->
            <div>
                <h4 class="text-lg font-bold mb-6" data-animate="slide-text" data-delay="500">Informasi</h4>
                <ul class="space-y-3 text-gray-400" data-animate="slide-text" data-delay="600">
                    <li><a href="#" class="hover:text-white transition-all">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white transition-all">Visi & Misi</a></li>
                    <li><a href="#" class="hover:text-white transition-all">Fasilitas</a></li>
                    <li><a href="#" class="hover:text-white transition-all">Prestasi</a></li>
                    <li><a href="#" class="hover:text-white transition-all">Berita & Event</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Kontak -->
            <div>
                <h4 class="text-lg font-bold mb-6" data-animate="slide-text" data-delay="700">Kontak</h4>
                <div class="space-y-6 text-gray-400" data-animate="slide-text" data-delay="800">
                    <div>
                        <p class="text-base font-semibold text-gray-300 mb-2">NIIS 1 & NIIS 2</p>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                <span>Jl. Manunggal XIX, Pasirjengkol, Kec. Majalaya, Karawang, Jawa Barat 41371</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-phone text-green-600"></i>
                                <span>0812-8215-9719</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-envelope text-green-600"></i>
                                <span>info@nurulimam.sch.id</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-300 mb-2">NIIS 3</p>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-green-600 mt-1"></i>
                                <span>Jl. Trisakti, Perum Klari Indah Permata, RT 028 RW 008,<br> Dusun Kopo, Desa
                                    Klari, Kec. Klari, Kab. Karawang 41371</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-phone text-green-600"></i>
                                <span>0812-8215-9719</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-envelope text-green-600"></i>
                                <span>info@nurulimam.sch.id</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center"
            data-animate="slide-text" data-delay="900">
            <p class="text-gray-400 text-sm">
                Nurul Imam Islamic School © 2019 - 2025. All Rights Reserved
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<!-- Back to top button (Glassmorphism no-ring) -->
<button id="backToTop" type="button"
    class="fixed bottom-44 right-4 z-50 w-12 h-12 bg-white/20 text-green-600 rounded-full shadow-xl backdrop-blur-md flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500"
    title="Back to Up">
    <i class="fas fa-chevron-up text-xl"></i>
</button>

<!-- Floating WhatsApp Button (Glassmorphism no-ring) -->
<div class="fixed bottom-6 right-4 z-40">
    <a href="https://wa.me/628123456789" target="_blank"
        class="w-12 h-12 bg-white/20 text-green-600 rounded-full flex items-center justify-center shadow-xl backdrop-blur-md hover:bg-white/30 transition-all hover:scale-110"
        title="Hubungi via WhatsApp">
        <i class="fab fa-whatsapp text-xl"></i>
    </a>
</div>

<!-- Floating Button -->
<div class="fixed bottom-20 right-4 z-40">
    <button id="chatbotToggle" type="button"
        class="w-12 h-12 bg-white/20 text-green-600 rounded-full flex items-center justify-center shadow-xl backdrop-blur-md hover:bg-white/30 transition-all hover:scale-110 cursor-pointer"
        title="Buka Chatbot">
        <i class="fas fa-comment-alt text-xl"></i>
    </button>
</div>

<!-- Chatbox -->
<div id="chatbotBox"
    class="fixed bottom-24 right-6 z-50 w-96 max-w-[calc(100vw-2rem)] bg-white/20 backdrop-blur-lg border border-white/30 rounded-2xl shadow-2xl hidden flex-col overflow-hidden">

    <!-- Header -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fas fa-robot text-sm"></i>
            </div>
            <div>
                <h3 class="font-semibold">Asisten Sekolah</h3>
                <p class="text-xs opacity-90">Online</p>
            </div>
        </div>
        <button id="closeChatbot" class="text-white/80 hover:text-white text-xl transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Messages Area -->
    <div id="chatMessages"
        class="relative flex-1 overflow-y-auto h-80 p-4 space-y-3 bg-white/10 backdrop-blur-sm border-t border-white/20">
        <svg class="absolute inset-0 w-full h-full opacity-10 pointer-events-none" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice">
            <defs>
                <pattern id="starBot" patternUnits="userSpaceOnUse" width="20" height="20">
                    <path d="M10 0 L12 8 L20 10 L12 12 L10 20 L8 12 L0 10 L8 8 Z" fill="none" stroke="#16610E"
                        stroke-width="0.8" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#starBot)" />
        </svg>

        <!-- Welcome message -->
        <div class="text-left chat-animation relative z-10">
            <div class="inline-block bg-white text-gray-700 px-4 py-2 rounded-2xl rounded-tl-sm shadow-sm max-w-xs">
                <p class="text-sm">Halo! Saya asisten virtual sekolah. Ada yang bisa saya bantu?</p>
            </div>
            <p class="text-xs text-gray-500 mt-1 ml-2">Barusan</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div id="quickActions" class="px-4 py-2 bg-white/30 backdrop-blur-sm border-t border-white/20">
        <p class="text-xs text-gray-500 mb-2">Pertanyaan populer:</p>
        <div class="flex flex-wrap gap-1">
            <button
                class="quick-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors"
                data-message="Bagaimana cara daftar?">
                📝 Pendaftaran
            </button>
            <button
                class="quick-btn px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs hover:bg-blue-200 transition-colors"
                data-message="Program apa saja yang ada?">
                📚 Program
            </button>
            <button
                class="quick-btn px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs hover:bg-purple-200 transition-colors"
                data-message="Jam belajar berapa?">
                🕐 Jadwal
            </button>
            <button
                class="quick-btn px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs hover:bg-orange-200 transition-colors"
                data-message="Dimana lokasi sekolah?">
                📍 Lokasi
            </button>
        </div>
    </div>

    <!-- Input Form -->
    <div class="p-4 bg-white/30 backdrop-blur-sm border-t border-white/20">
        <form id="chatbotForm" class="flex gap-2">
            <input type="text" id="chatInput" placeholder="Ketik pertanyaan..."
                class="flex-1 p-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm bg-white/70 backdrop-blur-md">
            <button type="submit" id="sendBtn"
                class="px-4 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-paper-plane text-sm"></i>
            </button>
        </form>
    </div>
</div>


<script>
    // DOM Elements
    const chatbotToggle = document.getElementById('chatbotToggle');
    const chatbotBox = document.getElementById('chatbotBox');
    const closeChatbot = document.getElementById('closeChatbot');
    const chatbotForm = document.getElementById('chatbotForm');
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');
    const sendBtn = document.getElementById('sendBtn');
    const quickActions = document.getElementById('quickActions');

    let isLoading = false;

    // Toggle chatbot
    chatbotToggle.addEventListener('click', () => {
        chatbotBox.classList.toggle('hidden');
        if (!chatbotBox.classList.contains('hidden')) {
            chatInput.focus();
        }
    });

    // Close chatbot
    closeChatbot.addEventListener('click', () => {
        chatbotBox.classList.add('hidden');
    });

    // Quick action buttons
    document.querySelectorAll('.quick-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const message = btn.getAttribute('data-message');
            chatInput.value = message;
            sendMessage();
        });
    });

    // Form submit
    chatbotForm.addEventListener('submit', function(e) {
        e.preventDefault();
        sendMessage();
    });

    // Send message function
    function sendMessage() {
        const userMessage = chatInput.value.trim();
        if (!userMessage || isLoading) return;

        // Hide quick actions after first message
        if (quickActions) {
            quickActions.style.display = 'none';
        }

        // Add user message
        addMessage(userMessage, 'user');
        chatInput.value = '';

        // Show typing indicator
        showTypingIndicator();

        // Send to API
        sendToAPI(userMessage);
    }

    // Add message to chat
    function addMessage(message, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `text-${sender === 'user' ? 'right' : 'left'} chat-animation`;

        const timestamp = new Date().toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit'
        });

        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="inline-block bg-green-500 text-white px-4 py-2 rounded-2xl rounded-tr-sm shadow-sm max-w-xs">
                    <p class="text-sm">${message}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1 mr-2">${timestamp}</p>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="inline-block bg-white text-gray-700 px-4 py-2 rounded-2xl rounded-tl-sm shadow-sm max-w-xs">
                    <p class="text-sm">${message}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1 ml-2">${timestamp}</p>
            `;
        }

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Show typing indicator
    function showTypingIndicator() {
        isLoading = true;
        sendBtn.disabled = true;

        const typingDiv = document.createElement('div');
        typingDiv.id = 'typingIndicator';
        typingDiv.className = 'text-left';
        typingDiv.innerHTML = `
            <div class="inline-block bg-white text-gray-700 px-4 py-3 rounded-2xl rounded-tl-sm shadow-sm">
                <div class="flex space-x-1">
                    <div class="typing-indicator"></div>
                    <div class="typing-indicator"></div>
                    <div class="typing-indicator"></div>
                </div>
            </div>
        `;

        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Remove typing indicator
    function removeTypingIndicator() {
        const typingIndicator = document.getElementById('typingIndicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
        isLoading = false;
        sendBtn.disabled = false;
    }

    // Send to API
    function sendToAPI(message) {
        fetch('/api/chatbot/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    message: message
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                removeTypingIndicator();

                if (data.status === 'success') {
                    addMessage(data.reply, 'bot');
                } else {
                    addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', 'bot');
                }
            })
            .catch(error => {
                console.error('Chatbot error:', error);
                removeTypingIndicator();
                addMessage('Maaf, terjadi kesalahan koneksi. Silakan coba lagi.', 'bot');
            });
    }

    // Auto-focus input when chatbox opens
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (!chatbotBox.classList.contains('hidden')) {
                setTimeout(() => chatInput.focus(), 100);
            }
        });
    });

    observer.observe(chatbotBox, {
        attributes: true,
        attributeFilter: ['class']
    });

    // Handle Enter key
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    console.log('✅ Enhanced chatbot loaded successfully!');
</script>
