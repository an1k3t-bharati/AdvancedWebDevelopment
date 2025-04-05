// public/assets/js/contactMap.js

function openDirections() {
    const destination = encodeURIComponent("Wulfruna St, Wolverhampton WV1 1LY");

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                const origin = `${position.coords.latitude},${position.coords.longitude}`;
                const mapUrl = `https://www.google.com/maps/dir/?api=1&origin=${origin}&destination=${destination}`;
                window.open(mapUrl, '_blank');
            },
            function () {
                // Fallback if user denies location access
                window.open(`https://www.google.com/maps/dir/?api=1&destination=${destination}`, '_blank');
            }
        );
    } else {
        // Fallback if geolocation is not supported
        window.open(`https://www.google.com/maps/dir/?api=1&destination=${destination}`, '_blank');
    }
}
