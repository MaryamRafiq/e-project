
 // Initialize Feather Icons
 feather.replace();

 // Initialize CountUp instances
 const ignoredTickets = new countUp.CountUp('ignoredTickets', 427, {
     duration: 2.5,
     useEasing: true,
     useGrouping: true
 });
 ignoredTickets.start();

 const coffeeCount = new countUp.CountUp('coffeeCount', 892, {
     duration: 2.5,
     useEasing: true,
     useGrouping: true
 });
 coffeeCount.start();

 const serverHealth = new countUp.CountUp('serverHealth', 42, {
     duration: 2.5,
     useEasing: true,
     useGrouping: true,
     suffix: '%'
 });
 serverHealth.start();

 const meetingsAvoided = new countUp.CountUp('meetingsAvoided', 156, {
     duration: 2.5,
     useEasing: true,
     useGrouping: true
 });
 meetingsAvoided.start();

 // Initialize Charts
 const productivityCtx = document.getElementById('productivityChart').getContext('2d');
 new Chart(productivityCtx, {
     type: 'line',
     data: {
         labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
         datasets: [{
             label: 'Productivity',
             data: [20, 35, 45, 30, 25],
             borderColor: 'rgb(167, 139, 250)',
             tension: 0.4
         }, {
             label: 'Coffee Cups',
             data: [5, 8, 12, 15, 20],
             borderColor: 'rgb(251, 191, 36)',
             tension: 0.4
         }]
     },
     options: {
         plugins: {
             legend: {
                 labels: {
                     color: '#9CA3AF'
                 }
             }
         },
         scales: {
             y: {
                 grid: {
                     color: '#374151'
                 },
                 ticks: {
                     color: '#9CA3AF'
                 }
             },
             x: {
                 grid: {
                     color: '#374151'
                 },
                 ticks: {
                     color: '#9CA3AF'
                 }
             }
         }
     }
 });

 const ticketCtx = document.getElementById('ticketChart').getContext('2d');
 new Chart(ticketCtx, {
     type: 'bar',
     data: {
         labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
         datasets: [{
             label: 'Tickets',
             data: [65, 59, 80, 81, 56],
             backgroundColor: 'rgb(239, 68, 68)',
         }, {
             label: 'Excuses',
             data: [70, 65, 85, 85, 60],
             backgroundColor: 'rgb(147, 51, 234)',
         }]
     },
     options: {
         plugins: {
             legend: {
                 labels: {
                     color: '#9CA3AF'
                 }
             }
         },
         scales: {
             y: {
                 grid: {
                     color: '#374151'
                 },
                 ticks: {
                     color: '#9CA3AF'
                 }
             },
             x: {
                 grid: {
                     color: '#374151'
                 },
                 ticks: {
                     color: '#9CA3AF'
                 }
             }
         }
     }
 });

 // Animate progress bars
 gsap.from("#ignoredProgress", {
     width: "0%",
     duration: 2,
     ease: "power2.out"
 });

 gsap.from("#coffeeProgress", {
     width: "0%",
     duration: 2,
     ease: "power2.out"
 });

 gsap.from("#serverProgress", {
     width: "0%",
     duration: 2,
     ease: "power2.out"
 });

 gsap.from("#meetingsProgress", {
     width: "0%",
     duration: 2,
     ease: "power2.out"
 });