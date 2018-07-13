<table style="width: 100%;">
    <tr>
        <td>Nombre:</td>
        <td>{{ $contact->name }}</td>
    </tr>
    <tr>
        <td>Correo:</td>
        <td>{{ $contact->email }}</td>
    </tr>
    <tr>
        <td>Teléfono:</td>
        <td>{{ $contact->phone }}</td>
    </tr>
    <tr>
        <td>Mensaje</td>
        <td>{{ $contact->message }}</td>
    </tr>
</table>