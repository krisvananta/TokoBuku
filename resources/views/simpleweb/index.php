<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Book List</h1>
    <div id="message"></div>
    <table id="bookTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data from API will be inserted here -->
        </tbody>
    </table>

    <script>
        // Define the API endpoint
        const API_URL = "https://your-api-endpoint-here.com/api/books";

        // Function to fetch books from API
        async function fetchBooks() {
            const messageDiv = document.getElementById("message");
            const bookTableBody = document.querySelector("#bookTable tbody");

            try {
                // Display loading message
                messageDiv.innerText = "Loading books...";

                // Fetch data from API
                const response = await fetch(API_URL);
                const data = await response.json();

                // Check if the response is successful
                if (data.success) {
                    messageDiv.innerText = ""; // Clear the loading message
                    const books = data.data;

                    // Populate the table with book data
                    books.forEach((book, index) => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
          <td>${index + 1}</td>
          <td>${book.title}</td>
          <td>${book.author}</td>
          <td>${book.published_year}</td>
        `;
                        bookTableBody.appendChild(row);
                    });
                } else {
                    messageDiv.innerText = "Failed to fetch books.";
                }
            } catch (error) {
                console.error("Error fetching books:", error);
                messageDiv.innerText = "An error occurred while fetching books.";
            }
        }

        // Call the fetchBooks function on page load
        fetchBooks();
    </script>
</body>

</html>