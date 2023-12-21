<tr>
    <th scope="row">{{ $client->id }}</th>
    <td>{{ $client->first_name }}</td>
    <td>{{ $client->last_name }}</td>
    <td>{{ $client->email }}</td>
    <td>{{ $client->phone }}</td>
    <td><img width="150" src="{{ asset('storage/' . $client->avatar) }}" alt=""></td>
    <td>
        <x-AnchorButton color="primary" href="{{ route('client.edit', $client->id) }}" name="Edit" />
        <x-AnchorButton color="info" href="{{ route('client.show', $client->id) }}" name="Show" />
        <x-AnchorButton color="danger" href="{{ route('client.show', $client->id) }}" name="Delete" />
    </td>
</tr>
