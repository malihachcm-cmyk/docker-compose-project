/*
 * LESSON: index.js - The Entry Point of React
 * ============================================
 *
 * This file is the FIRST JavaScript file that runs.
 * It takes your App component and puts it inside the HTML page.
 *
 * Think of it like this:
 * - index.html has an empty box (div id="root")
 * - index.js puts your App inside that box
 */

import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';

// Find the empty div in index.html
const rootElement = document.getElementById('root');

// Create a React "root" and render our App inside it
const root = ReactDOM.createRoot(rootElement);
root.render(
    <React.StrictMode>
        <App />
    </React.StrictMode>
);
