{{-- Hello valued subscribers,

<div style="background-color: red;">
<h1>{{ $template->title }}</h1>

<h3>{{ $template->description }}</h3>

{{-- link --}}
<a href="{{ $template->media }}" ><h6>{{ $template->media }}</h6></a>

Facebook: [Link]
Twitter: [Link]
LinkedIn: [Link]
Instagram: [Link]
</div>
 --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
        background: #aaa;
        display: flex;
        height: 100vh;
        font-size: 1.5em;
        }

        div {
            position: relative;
            width: 600px;
            margin: auto;
            padding: 1rem;
            background-color: transparent;
            background-image: linear-gradient(
                    -45deg,
                    transparent,
                    transparent 2%,
                    white 2%,
                    white 85%,
                    transparent,
                    85%,
                    transparent
                ),
                linear-gradient(to bottom right, #2ad, #2ad 90%, transparent 90%);
            background-position: top left, 0.2em 0.2em;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 15px #0005);
        }

        div::before,
        div::after {
            position: absolute;
            z-index: -1;
            display: block;
            width: 3rem;
            height: 4rem;
            content: "";
            z-index: 0;
            font-size: 8rem;
            font-family: Georgia, Times, Garamond, serif;
        }

        div::before {
            top: -2rem;
            left: 1rem;
            content: open-quote;
        }

        div::after {
            bottom: -1rem;
            right: 1rem;
            content: close-quote;
        }

        div::before,
        div::after,
        div h2 {
            text-shadow: -2px 2px #fff, -1.5px 1.5px #fff, -1px 1px #fff, -0.5px 0.5px #fff;
        }

        h2 {
            margin-block-end: 1rem;
        }

        p {
            margin-block-start: 1rem;
            text-indent: 2ch;
        }
    </style>
</head>
<body>
    <div>
        <p>Hey, Stranger!</p>
        <h2>{{ $template->title }}</h2>
        <p>{{ $template->description }}</p>
        <img src="{{ $template->media }}" alt="image" srcset="">
        <h4 align="right">{{ $template->media }}</h4>
    </div>
</body>
</html>

