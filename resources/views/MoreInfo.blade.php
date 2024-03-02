<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Infos</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>

    <section>
        <h2>{{ $Type }} {{ $More->getID() }}, Information:</h2>

        @if($Type == 'candidate')
            <!-- Competences Table -->
            <table>
                <caption>Competences</caption>
                <!-- Your Competences table here -->
            </table>

            <!-- Certificates Table -->
            <table>
                <caption>Certificates</caption>
                <!-- Your Certificates table here -->
            </table>

            <!-- Diplomas Table -->
            <table>
                <caption>Diplomas</caption>
                <!-- Your Diplomas table here -->
            </table>

            <!-- Download CV Link -->
            <h2>Download CV: {{ $More->getCv() }}</h2>

        @else
            <!-- Announcements Table -->
            <table>
                <caption>Announcements</caption>
                <!-- Your Announcements table here -->
            </table>

        @endif
    </section>

</body>
</html>
