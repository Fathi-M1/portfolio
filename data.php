<?php
// Resume Data File
// Centralized data for dynamic content rendering

$resume = [
    'personal' => [
        'name' => 'Fathi Mahad',
        'title' => 'Full Stack Developer & Data Science Student',
        'bio' => 'Second-year Computer Science student specializing in Data Science at FEU Tech, Manila. I build projects at the intersection of data, systems, and real-world impact.',
        'phone' => '+63 905 123 4567',
        'email' => 'fathi@example.com',
        'location' => 'Manila, Philippines',
        'github' => 'github.com/Fathi-M1',
        'linkedin' => 'linkedin.com/in/fathimahad',
        'stats' => [
            ['number' => '3+', 'label' => 'Years Coding'],
            ['number' => '8+', 'label' => 'Projects'],
            ['number' => '4.0', 'label' => 'Target GPA']
        ]
    ],
    'about' => [
        'title' => 'CS student with a deep interest in how data, code, and critical thinking can create meaningful change — both in the Philippines and in Somaliland, where I\'m from. I think in frameworks and build systems, not just features.',
        'details' => [
            ['label' => 'Degree', 'value' => 'B.S. Computer Science'],
            ['label' => 'Specialization', 'value' => 'Data Science'],
            ['label' => 'University', 'value' => 'FEU Tech, Manila'],
            ['label' => 'Year', 'value' => '2nd Year']
        ]
    ],
    'skills' => [
        ['name' => 'Python', 'percentage' => 85],
        ['name' => 'Data Analysis', 'percentage' => 78],
        ['name' => 'HTML / CSS / JS', 'percentage' => 80],
        ['name' => 'SQL / SQLite', 'percentage' => 72],
        ['name' => 'React JS', 'percentage' => 65],
        ['name' => 'Machine Learning', 'percentage' => 60]
    ],
    'experience' => [
        [
            'period' => '2025 — Present',
            'role' => 'Founder & Lead Developer',
            'company' => 'Noradin Schools Website',
            'location' => 'Hargeisa, Somaliland',
            'description' => 'Designed and built a responsive static website for a 14-branch private school chain using plain HTML, CSS, and JS. Deployed via GitHub to Netlify with a clean modernistic green-gold aesthetic.',
            'tags' => ['HTML/CSS', 'JavaScript', 'Netlify']
        ],
        [
            'period' => '2024',
            'role' => 'Mobile App Developer',
            'company' => 'GABAY — NCR Transit Advisory',
            'location' => 'Manila',
            'description' => 'Built a real-time transit advisory system for Metro Manila with AI voice integration, live ETA and queue data, and a dark terminal-inspired UI using React JS.',
            'tags' => ['React JS', 'AI Integration', 'UI Design']
        ],
        [
            'period' => '2024 — Present',
            'role' => 'EIF Applicant — Data Modeling Track',
            'company' => 'Eskwelabs Innovation Fellowship',
            'location' => 'Manila',
            'description' => 'Applying to the Eskwelabs Innovation Fellowship on the Data Modeling track, focused on building applied ML and data systems that address real regional problems.',
            'tags' => ['Data Modeling', 'ML', 'Fellowship']
        ],
        [
            'period' => '2023 — Present',
            'role' => 'Student Developer',
            'company' => 'FEU Institute of Technology',
            'location' => 'Manila',
            'description' => 'Coursework in Operating Systems, Discrete Structures, Analytics, and Physics. Pursuing a project-first learning strategy with a strict 3.0 GPA target.',
            'tags' => ['Data Science', 'OS', 'Analytics']
        ]
    ],
    'education' => [
        [
            'icon' => 'graduation',
            'year' => '2023 — 2027',
            'degree' => 'B.S. Computer Science',
            'institution' => 'FEU Institute of Technology',
            'location' => 'Manila, Philippines',
            'details' => 'Specialization: Data Science'
        ],
        [
            'icon' => 'briefcase',
            'year' => 'Ongoing',
            'degree' => 'Eskwelabs Innovation Fellowship',
            'institution' => 'Data Modeling Track',
            'location' => 'Applicant',
            'details' => 'Focus: applied ML & data systems'
        ],
        [
            'icon' => 'monitor',
            'year' => 'Self-Directed',
            'degree' => 'Sovereign Computing Environment',
            'institution' => 'Arch Linux & Ollama',
            'location' => 'Local AI integration',
            'details' => 'Karpathy NN: Zero to Hero & systems research'
        ],
        [
            'icon' => 'code',
            'year' => 'Upcoming',
            'degree' => 'Computing in Python + 6 Courses',
            'institution' => 'Advanced Coursework',
            'location' => 'FEU Tech',
            'details' => 'Data Visualization, Automata Theory, Networks, Technopreneurship, Linear Algebra'
        ]
    ],
    'portfolio' => [
        [
            'number' => '01',
            'name' => 'Noradin Schools Website',
            'description' => 'Responsive static site for a 14-branch school chain in Hargeisa with hero slideshow, gallery, and events sections.',
            'tags' => ['HTML', 'CSS', 'JS', 'Netlify']
        ],
        [
            'number' => '02',
            'name' => 'GABAY Transit App',
            'description' => 'Real-time NCR transit advisory with AI voice integration, live ETA data, and a dark terminal-inspired UI in React JS.',
            'tags' => ['React', 'AI Voice', 'Real-time']
        ],
        [
            'number' => '03',
            'name' => 'Personal Finance Tracker CLI',
            'description' => 'Anchor project for Computing in Python — a command-line finance tracker with clean data persistence via SQLite.',
            'tags' => ['Python', 'CLI', 'SQLite']
        ]
    ]
];

?>
