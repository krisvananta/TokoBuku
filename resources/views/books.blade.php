<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">List of Books</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="book-table-body">
                <!-- Data will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <script>
        // Fetch data from API
        fetch("{{ url('/api/books') }}")
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const books = data.data.data; // Accessing paginated data
                    const tableBody = document.getElementById('book-table-body');

                    books.forEach(book => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${book.id}</td>
                            <td>${book.judul}</td>
                            <td>${book.penulis}</td>
                            <td>${book.harga}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    console.error("Failed to fetch books.");
                }
            })
            .catch(error => console.error('Error fetching API:', error));
    </script>
</body>
</html>
