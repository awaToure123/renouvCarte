<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes de renouvellements de Cartes</title>
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .table_component {
            overflow: auto;
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table_component table {
            width: 100%;
            border: 1px solid #dededf;
            border-collapse: collapse;
            text-align: left;
        }

        .table_component caption {
            caption-side: top;
            text-align: left;
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .table_component th, .table_component td {
            border: 1px solid #dededf;
            padding: 10px;
        }

        .table_component th {
            background-color: #566f81;
            color: #ffffff;
        }

        .table_component td {
            background-color: #afc8ca;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="table_component" role="region" tabindex="0">
        <table>
            <caption>Listes de renouvellement de cartes</caption>
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Tel</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandeAll as $demande)
                @if($demande->status =='En-cours')

               <tr>
                 <td>
                  {{$demande->id}}
                 </td>
                 <td>
                 {{optional($demande->demandeur)->nom}}
                 </td>
                 <td>

                   {{optional($demande->demandeur)->prenom}}

                 </td>
                 <td>
                 {{optional($demande->demandeur)->tel}}

                 </td>
                 <td>
                 {{$demande->created_at}}

                 </td>

               </tr>
              @endif
               @endforeach
<!-- #region -->
            </tbody>
        </table>
        <div style="margin-top: 8px;">Source: <a href="#" target="_blank">Listes des demandes de cartes, Date : {{date('Y-m-d')}}</a></div>
    </div>
</body>
</html>
