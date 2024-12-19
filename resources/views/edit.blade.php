<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage All Data</title>
</head>
<body>

    <h2>Manage All Data</h2>

    <!-- Form untuk menambah data baru -->
    <form action="/edit" method="POST">
        @csrf
        <h3>Create New Profile</h3>
        <input type="hidden" name="model" value="profile">
        
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Create Profile</button>
    </form>

    <!-- Displaying all data for each model (Books, Profiles, Journals, etc.) -->
    @foreach (['profiles', 'books', 'jurnals', 'fyps', 'cds', 'newspapers'] as $model)
        <h3>{{ ucfirst($model) }}</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($$model as $item)
                    <tr>
                        <td>{{ $item->name ?? $item->Judul_Buku ?? $item->Judul_Jurnal ?? $item->Judul_FYP ?? $item->Judul_CD ?? $item->Judul_Newspapers }}</td>
                        <td>
                            @foreach ($item->getAttributes() as $key => $value)
                                <strong>{{ $key }}:</strong> {{ $value }}<br>
                            @endforeach
                        </td>
                        <td>
                            <!-- Edit Button -->
                            <form action="/edit/{{ strtolower(class_basename($item)) }}/{{ $item->id }}" method="GET">
                                @csrf
                                <button type="submit">Edit</button>
                            </form>

                            <!-- Delete Button -->
                            <form action="/edit/{{ strtolower(class_basename($item)) }}/{{ $item->id }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>
</html>
