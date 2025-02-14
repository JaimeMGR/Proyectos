CREATE TABLE mobiliario (
    id VARCHAR(255) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    image TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);


INSERT INTO mobiliario (id, title, company, image, price) VALUES
('rec4f2RIftFCb7aHh', 'albany table', 'marcos', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F01_albany_table.jpg?alt=media&token=fe8f3d8c-27ea-49fb-afbc-cd3a9fd5a07e', 79.99),
('rec8kkCmSiMkbkiko', 'accent chair', 'caressa', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F02_accent_chair.jpg?alt=media&token=8751f618-1322-4dac-a4fc-ab1d0e3fc5c6', 25.99),
('recBohCqQsot4Q4II', 'wooden table', 'caressa', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F03_wooden_table.jpg?alt=media&token=d0c42974-ab71-494e-a196-723eb05a5eab', 45.99),
('recDG1JRZnbpRHpoy', 'dining table', 'caressa', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F04_dinning_table.jpg?alt=media&token=e7942ddf-d655-4e4e-9147-09e2ef56d920', 6.99),
('recNWGyP7kjFhSqw3', 'sofa set', 'liddy', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F05_sofa_set.jpg?alt=media&token=1dd193e5-8f68-45d6-9e68-5260775f5268', 69.99),
('recZEougL5bbY4AEx', 'modern bookshelf', 'marcos', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F06_modern_bookshelf.jpg?alt=media&token=6ed7f1e6-2b81-43fd-b508-32f4dcd101a7', 8.99),
('recjMK1jgTb2ld7sv', 'emperor bed', 'liddy', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F07_emperor_bed.png?alt=media&token=4b583ee3-bec7-48b7-9840-f49faa4ce224', 21.99),
('recmg2a1ctaEJNZhu', 'utopia sofa', 'marcos', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F08_utopia_sofa.jpg?alt=media&token=04a70616-88e5-4380-87c4-ca385cba8d50', 39.95),
('recvKMNR3YFw0bEt3', 'entertainment center', 'liddy', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F09_entertaiment_center.jpg?alt=media&token=43281598-0891-4d65-934b-f6071fca53eb', 29.98),
('recxaXFy5IW539sgM', 'albany sectional', 'ikea', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F10_albany_Sectional.jpg?alt=media&token=ffda5e39-8d94-4453-8e14-cfa2f29a9ff0', 10.99),
('recyqtRglGNGtO4Q5', 'leather sofa', 'liddy', 'https://firebasestorage.googleapis.com/v0/b/chat-7d403.appspot.com/o/muebles%2F11_leather_sofa.webp?alt=media&token=b6d69278-e5d0-4e5a-b679-68a669021fee', 9.99);
