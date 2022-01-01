<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $feed->info->detail->user->nickname }} - TikTok</title>
    <link rel="stylesheet" href="https://unpkg.com/bulmaswatch/superhero/bulmaswatch.min.css">
    <link rel="stylesheet" href="../styles/feed.css">
</head>
<body>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title">{{ $feed->info->detail->user->uniqueId }}'s profile</p>
                <p class="subtitle">{{ $feed->info->detail->user->signature }}</p>
            </div>
        </div>
    </section>
    @include('feed')
</body>
</html>
