import express from "express";
import path from "path";
import { fileURLToPath } from "url";

const app = express();
const PORT = 3002;
//set on 3002 so that it does not clash with backend or other ones

// Define __dirname manually
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Serve static files from the 'public' directory
app.use(express.static(path.join(__dirname)));

// Serve the main chatbot HTML file
app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "home1.html"));
});

// Start the server
app.listen(PORT, () => {
    console.log(`🚀 Static server running at http://localhost:${PORT}`);
});
