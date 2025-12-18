import React, { useState, useRef, useEffect } from 'react';
import axios from 'axios';

function App() {
    const [messages, setMessages] = useState([
        { type: 'system', text: 'Welcome! Type a command or click a button below.' },
        { type: 'system', text: 'Try: "check backend status" to test the connection.' }
    ]);
    const [input, setInput] = useState('');
    const [loading, setLoading] = useState(false);
    const chatEndRef = useRef(null);

    useEffect(() => {
        chatEndRef.current?.scrollIntoView({ behavior: 'smooth' });
    }, [messages]);

    const addMessage = (type, text) => {
        setMessages(prev => [...prev, { type, text }]);
    };

    const checkBackendStatus = async () => {
        addMessage('user', 'check backend status');
        setLoading(true);

        try {
            const response = await axios.get('/api/health');
            const data = response.data;

            addMessage('bot', `Backend Status: ${data.status.toUpperCase()}`);
            addMessage('bot', `Message: ${data.message}`);
            addMessage('bot', `PHP Version: ${data.data.php_version}`);
            addMessage('bot', `Laravel Version: ${data.data.laravel_version}`);
            addMessage('bot', `Environment: ${data.data.environment}`);
            addMessage('bot', `Timestamp: ${data.data.timestamp}`);
        } catch (err) {
            addMessage('error', 'Failed to connect to backend. Is Laravel running?');
        }

        setLoading(false);
    };

    const getUsers = async () => {
        addMessage('user', 'get users');
        setLoading(true);

        try {
            const response = await axios.get('/api/demo');
            const users = response.data.data.users;

            addMessage('bot', `Found ${users.length} users:`);
            users.forEach(user => {
                addMessage('bot', `  → ${user.name} (${user.role})`);
            });
        } catch (err) {
            addMessage('error', 'Failed to fetch users from backend.');
        }

        setLoading(false);
    };

    const showArchitecture = async () => {
        addMessage('user', 'show architecture');
        setLoading(true);

        try {
            const response = await axios.get('/api/info');
            const arch = response.data.architecture;

            addMessage('bot', 'System Architecture:');
            Object.entries(arch).forEach(([key, value]) => {
                addMessage('bot', `  ${key.toUpperCase()}: ${value.technology}`);
            });
        } catch (err) {
            addMessage('error', 'Failed to fetch architecture info.');
        }

        setLoading(false);
    };

    const showHelp = () => {
        addMessage('user', 'help');
        addMessage('bot', 'Available commands:');
        addMessage('bot', '  → check backend status');
        addMessage('bot', '  → get users');
        addMessage('bot', '  → show architecture');
        addMessage('bot', '  → help');
        addMessage('bot', '  → clear');
    };

    const clearChat = () => {
        setMessages([
            { type: 'system', text: 'Chat cleared. Type a command to continue.' }
        ]);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        if (!input.trim() || loading) return;

        const cmd = input.toLowerCase().trim();
        setInput('');

        if (cmd.includes('status') || cmd.includes('health') || cmd.includes('backend')) {
            checkBackendStatus();
        } else if (cmd.includes('user')) {
            getUsers();
        } else if (cmd.includes('arch') || cmd.includes('info')) {
            showArchitecture();
        } else if (cmd === 'help') {
            showHelp();
        } else if (cmd === 'clear') {
            clearChat();
        } else {
            addMessage('user', input);
            addMessage('bot', `Unknown command: "${input}". Type "help" for available commands.`);
        }
    };

    return (
        <div style={styles.container}>
            <header style={styles.header}>
                <h1 style={styles.title}>My First Docker Compose Project</h1>
                <p style={styles.subtitle}>by Maliha</p>
            </header>

            <div style={styles.chatContainer}>
                <div style={styles.chatBox}>
                    {messages.map((msg, idx) => (
                        <div key={idx} style={{
                            ...styles.message,
                            ...(msg.type === 'user' ? styles.userMessage : {}),
                            ...(msg.type === 'bot' ? styles.botMessage : {}),
                            ...(msg.type === 'system' ? styles.systemMessage : {}),
                            ...(msg.type === 'error' ? styles.errorMessage : {}),
                        }}>
                            {msg.type === 'user' && <span style={styles.prefix}>{'>'} </span>}
                            {msg.type === 'bot' && <span style={styles.prefix}>{'←'} </span>}
                            {msg.text}
                        </div>
                    ))}
                    {loading && (
                        <div style={styles.systemMessage}>
                            Connecting to backend...
                        </div>
                    )}
                    <div ref={chatEndRef} />
                </div>

                <form onSubmit={handleSubmit} style={styles.inputForm}>
                    <input
                        type="text"
                        value={input}
                        onChange={(e) => setInput(e.target.value)}
                        placeholder="Type a command..."
                        style={styles.input}
                        disabled={loading}
                    />
                    <button type="submit" style={styles.sendButton} disabled={loading}>
                        Send
                    </button>
                </form>

                <div style={styles.quickButtons}>
                    <button onClick={checkBackendStatus} disabled={loading} style={styles.quickButton}>
                        Check Backend Status
                    </button>
                    <button onClick={getUsers} disabled={loading} style={styles.quickButton}>
                        Get Users
                    </button>
                    <button onClick={showArchitecture} disabled={loading} style={styles.quickButton}>
                        Show Architecture
                    </button>
                    <button onClick={showHelp} disabled={loading} style={styles.quickButtonAlt}>
                        Help
                    </button>
                    <button onClick={clearChat} disabled={loading} style={styles.quickButtonAlt}>
                        Clear
                    </button>
                </div>
            </div>

            <footer style={styles.footer}>
                <p>React + Laravel + Nginx + Docker Compose</p>
            </footer>
        </div>
    );
}

const styles = {
    container: {
        fontFamily: 'Monaco, Consolas, "Courier New", monospace',
        height: '100vh',
        backgroundColor: '#1a1a2e',
        color: '#eee',
        display: 'flex',
        flexDirection: 'column',
        overflow: 'hidden',
    },
    header: {
        padding: '30px 20px',
        textAlign: 'center',
        borderBottom: '1px solid #333',
    },
    title: {
        margin: 0,
        fontSize: '1.8rem',
        fontWeight: 'normal',
        color: '#00ff88',
    },
    subtitle: {
        margin: '8px 0 0 0',
        fontSize: '1rem',
        color: '#888',
    },
    chatContainer: {
        flex: 1,
        maxWidth: '800px',
        width: '100%',
        margin: '0 auto',
        padding: '20px',
        display: 'flex',
        flexDirection: 'column',
    },
    chatBox: {
        flex: 1,
        backgroundColor: '#0d0d1a',
        borderRadius: '8px',
        padding: '20px',
        marginBottom: '15px',
        overflowY: 'auto',
        border: '1px solid #333',
    },
    message: {
        marginBottom: '8px',
        lineHeight: 1.5,
        fontSize: '0.95rem',
    },
    userMessage: {
        color: '#00ff88',
    },
    botMessage: {
        color: '#fff',
    },
    systemMessage: {
        color: '#666',
        fontStyle: 'italic',
    },
    errorMessage: {
        color: '#ff6b6b',
    },
    prefix: {
        opacity: 0.7,
    },
    inputForm: {
        display: 'flex',
        gap: '10px',
        marginBottom: '15px',
    },
    input: {
        flex: 1,
        padding: '12px 15px',
        fontSize: '1rem',
        backgroundColor: '#0d0d1a',
        border: '1px solid #333',
        borderRadius: '6px',
        color: '#00ff88',
        fontFamily: 'inherit',
        outline: 'none',
    },
    sendButton: {
        padding: '12px 25px',
        fontSize: '1rem',
        backgroundColor: '#00ff88',
        color: '#1a1a2e',
        border: 'none',
        borderRadius: '6px',
        cursor: 'pointer',
        fontFamily: 'inherit',
        fontWeight: 'bold',
    },
    quickButtons: {
        display: 'flex',
        flexWrap: 'wrap',
        gap: '10px',
        justifyContent: 'center',
    },
    quickButton: {
        padding: '10px 18px',
        fontSize: '0.9rem',
        backgroundColor: 'transparent',
        color: '#00ff88',
        border: '1px solid #00ff88',
        borderRadius: '20px',
        cursor: 'pointer',
        fontFamily: 'inherit',
        transition: 'all 0.2s',
    },
    quickButtonAlt: {
        padding: '10px 18px',
        fontSize: '0.9rem',
        backgroundColor: 'transparent',
        color: '#666',
        border: '1px solid #444',
        borderRadius: '20px',
        cursor: 'pointer',
        fontFamily: 'inherit',
    },
    footer: {
        textAlign: 'center',
        padding: '20px',
        color: '#444',
        fontSize: '0.85rem',
        borderTop: '1px solid #333',
    },
};

export default App;
