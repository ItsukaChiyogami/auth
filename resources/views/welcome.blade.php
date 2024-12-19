<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 30%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px;
        }

        th, td {
            padding: 4px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            height: 20px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .no-data {
            text-align: center;
            padding: 10px;
            color: #999;
            font-size: 12px;
        }

        .login-container a {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .login-container a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>All Data</h2>

    <!-- Search Feature -->
    <div class="search-container">
        <h2>Search for Content</h2>
        <form action="/" method="GET">
            <input type="text" name="query" placeholder="Search..." value="{{ request()->input('query') }}" style="padding: 1px; width: 220px;">
            <button type="submit" style="padding: 1px 12px;">Search</button>
        </form>
    </div>

    <!-- Data Tables -->
    <h3>Profiles</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($profiles as $profile)
                <tr>
                    <td>{{ $profile->name }}</td>
                    <td>{{ $profile->username }}</td>
                    <td>{{ $profile->email }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="no-data">No profiles found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Books Results -->
    <h3>Books</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->Judul_Buku }}</td>
                    <td>{{ $book->Penulis }}</td>
                    <td>{{ $book->Penerbit }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="no-data">No books found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Books Results -->
    <h3>Jurnal</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
            </tr>
        </thead>
        <tbody>
        @forelse($jurnals as $jurnal)
                <tr>
                    <td>{{ $jurnal->Judul_Jurnal }}</td>
                    <td>{{ $jurnal->Penulis }}</td>
                    <td>{{ $jurnal->Penerbit }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="no-data">No books found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- FYP Results -->
    <h3>FYPs</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fyps as $fyp)
                <tr>
                    <td>{{ $fyp->Judul_FYP }}</td>
                </tr>
            @empty
                <tr><td class="no-data">No FYPs found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- CDs Results -->
    <h3>CDs</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cds as $cd)
                <tr>
                    <td>{{ $cd->Judul_CD }}</td>
                    <td>{{ $cd->Genre }}</td>
                </tr>
            @empty
                <tr><td colspan="2" class="no-data">No CDs found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Newspapers Results -->
    <h3>Newspapers</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @forelse($newspapers as $newspaper)
                <tr>
                    <td>{{ $newspaper->Judul_Newspapers }}</td>
                    <td>{{ $newspaper->Isi }}</td>
                </tr>
            @empty
                <tr><td colspan="2" class="no-data">No newspapers found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Login Link -->
    <div class="login-container">
        <a href="/login">Login</a>
    </div>

</body>
</html>
