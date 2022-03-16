<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Project Camp</h1>
    <ul>
        @forelse ($projects as $project)
        <li>
            <a href="{{ $project->path() }}"> {{$project->title}} </a>
        </li>
        @empty

        <li>
            No projects yet
        </li>
        @endforelse
    </ul>
    
</body>
</html>