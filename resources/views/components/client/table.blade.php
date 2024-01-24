<tr>
    <!-- Display client ID as a table row header -->
    <th scope="row">{{ $client->id }}</th>

    <!-- Display client first name, last name, email, and phone in separate table cells -->
    <td>{{ $client->first_name }}</td>
    <td>{{ $client->last_name }}</td>
    <td>{{ $client->email }}</td>
    <td>{{ $client->phone }}</td>

    <!-- Display client avatar with a maximum width of 150 pixels -->
    <td><img width="150" src="{{ asset('storage/' . $client->avatar) }}" alt=""></td>

    <!-- Action buttons for editing, showing, and deleting the client -->
    <td>
        <x-AnchorButton color="primary" href="{{ route('client.edit', $client->id) }}" name="Edit" />
        <x-AnchorButton color="info" href="{{ route('client.show', $client->id) }}" name="Show" />
        <x-AnchorButton color="danger" href="{{ route('client.show', $client->id) }}" name="Delete" />
    </td>
</tr>
