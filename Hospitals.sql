CREATE TABLE Hospitals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    province VARCHAR(255),
    address VARCHAR(255),
    city VARCHAR(255),
    phone VARCHAR(20)
);

-- Eastern Cape
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Cecilia Makiwane Hospital', 'Eastern Cape', '4 Billie Rd, Mdantsane', 'East London', '043 708 2111'),
('Duncan Village Day Hospital', 'Eastern Cape', 'Douglas Smith Highway', 'East London', '043 742 4768'),
('Fort Grey TB Hospital', 'Eastern Cape', 'Farm Grey Dell Airport Phase 1, Fort Grey Location, Greenfields', 'East London', '043 736 9850'),
('Frere Hospital', 'Eastern Cape', 'Amalinda Main Rd', 'East London', '043 709 1111'),
('Life Beacon Bay Hospital', 'Eastern Cape', '32 Quenera Dr', 'East London', '043 711 5100'),
('East London Private Hospital', 'Eastern Cape', '32 Albany St', 'East London', '043 722 3128'),
('Life St Dominic''s Hospital', 'Eastern Cape', '45 St Marks Road', 'East London', '043 707 9000'),
('Life St James Hospital', 'Eastern Cape', '36 St James Road, Southernwood', 'East London', '043 722 9685'),
('Life St. Marks Clinic', 'Eastern Cape', '16 St Andrews Rd', 'East London', '043 707 4400'),
('Nkqubela Chest Hospital', 'Eastern Cape', '1124 Billie Rd, Mdantsane', 'Mdantsane', '043 761 2131');

-- Free State
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Bloemcare Psychiatric Hospital', 'Free State', '11 A G Visser St', 'Bloemfontein', '051 446 3242'),
('Nurture Hillandale Hospital', 'Free State', 'Woodland Hills Wildlife Estate 6, Woodland Hills Blvd', 'Bloemfontein', '051 412 3300'),
('Mediclinic Bloemfontein', 'Free State', 'Kellner St & Parfitt Street, Westdene', 'Bloemfontein', '051 404 6666'),
('Life Pasteur Hospital', 'Free State', '54 Pasteur Dr', 'Bloemfontein', '051 522 6601'),
('Life Rosepark Hospital', 'Free State', '57 Gustav Cres', 'Bloemfontein', '051 505 5111'),
('Pelonomi Private Hospital', 'Free State', '121 Dr Belcher Road, Heidedal', 'Bloemfontein', '051 407 1500'),
('Netcare Universitas Private Hospital', 'Free State', '1 Logeman St', 'Bloemfontein', '051 506 3500'),
('Free State Psychiatric Complex Hospital', 'Free State', '35 Nico Van Der Merwe Avenue, Oranjesig', 'Bloemfontein', '051 407 9911'),
('National District Hospital', 'Free State', 'Roth Ave & Kolbe Ave', 'Bloemfontein', '051 493 9600'),
('Bongani Regional Hospital', 'Free State', 'Mothusi Road', 'Thabong', '057 916 8000'),
('Ernest Oppenheimer Hospital', 'Free State', '1 Power Rd', 'Welkom', '057 900 9111'),
('Welkom Medi Clinic', 'Free State', 'Meulen Street', 'Welkom', '057 916 5555'),
('Saint Helena Private Hospital', 'Free State', 'Hamlet Rd', 'Welkom', '057 391 4611');

-- Gauteng
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Bedford Gardens Hospital', 'Gauteng', '7 Leicester Road, Bedford Gardens, Bedfordview', 'Johannesburg', '011 677 8500'),
('Charlotte Maxeke Johannesburg Academic Hospital', 'Gauteng', 'Jubilee Rd', 'Johannesburg', '011 488 4911'),
('Chris Hani Baragwanath Hospital', 'Gauteng', '26 Chris Hani Rd', 'Johannesburg', '011 933 8000'),
('Coronation Hospital', 'Gauteng', 'Corner Fuel and Oudtshoorn Street, Coronationville', 'Johannesburg', '011 470 9000'),
('Gateway House', 'Gauteng', '1 Campbell St', 'Johannesburg', '011 440 0697'),
('Helen Joseph Hospital', 'Gauteng', '1 Perth Rd, Westdene', 'Johannesburg', '011 489 1011'),
('Leratong Hospital', 'Gauteng', '1 Adcock St & Randfontein Road, Chamdor', 'Johannesburg', '011 411 3500'),
('Mediclinic Morningside', 'Gauteng', 'Hill Roads, Sandton', 'Johannesburg', '011 282 5000'),
('Mediclinic Sandton', 'Gauteng', 'Main Rd & Peter Place, Bryanston', 'Sandton', '011 709 2000'),
('Nelson Mandela Children''s Hospital', 'Gauteng', '6 Jubilee Rd', 'Johannesburg', '011 274 5600'),
('Netcare Garden City Hospital', 'Gauteng', '35 Bartlett Rd', 'Mayfair West', '011 495 5000'),
('Netcare Linksfield Hospital', 'Gauteng', '24 12th Avenue, Orange Grove', 'Johannesburg', '011 647 3400'),
('Milpark Hospital', 'Gauteng', '9 Guild Rd, Parktown West', 'Johannesburg', '011 480 5600'),
('Netcare Mulbarton Hospital', 'Gauteng', '25 True N Rd, Mulbarton', 'Johannesburg', '011 682 4300'),
('Netcare Olivedale Hospital', 'Gauteng', 'Netcare Olivedale Hospital, President Fouche & Windsor Way, Olivedale', 'Johannesburg', '011 777 2000'),
('Netcare Park Lane Hospital', 'Gauteng', 'Junction Avenue & Park Lane, Hillbrow', 'Johannesburg', '011 480 5600'),
('Netcare Pinehaven Hospital', 'Gauteng', '1 Gateway Street, Pinehaven', 'Johannesburg', '011 858 2000'),
('Netcare Rand Hospital', 'Gauteng', 'Selma Ave & Republic Rd, Bordeaux', 'Johannesburg', '011 644 5300'),
('Netcare Rosebank Hospital', 'Gauteng', '14 Sturdee Avenue, Rosebank', 'Johannesburg', '011 328 0500');

-- Kwazulu-Natal
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Edendale Hospital', 'Kwazulu-Natal', 'Peter Kerchhoff St', 'PMB Central', '033 395 4311'),
('Grey''s Hospital', 'Kwazulu-Natal', '50 Prince Alfred St', 'Pietermaritzburg', '033 897 3000'),
('King Edward VIII Hospital', 'Kwazulu-Natal', 'Risecliff Rd', 'Durban Central', '031 360 3000'),
('Prince Mshiyeni Memorial Hospital', 'Kwazulu-Natal', 'Ingwavuma Rd', 'Umlazi', '031 907 8000'),
('St Aidans Hospital', 'Kwazulu-Natal', '1 Manors Rd, Manor', 'Durban North', '031 204 1300'),
('Netcare St Augustine''s Hospital', 'Kwazulu-Natal', '107 JB Marks Rd, Glenwood', 'Durban', '031 268 5000'),
('Netcare The Bay Hospital', 'Kwazulu-Natal', '2 Baumann Rd, Meer En See', 'Richards Bay', '035 780 6111'),
('Netcare Umhlanga Hospital', 'Kwazulu-Natal', '323 Umhlanga Rocks Drive, Umhlanga Rocks', 'Umhlanga', '031 582 5500'),
('Ngwelezana Hospital', 'Kwazulu-Natal', 'Mount View Rd', 'Empangeni', '035 787 0111');

-- Limpopo
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Dr CN Phatudi Hospital', 'Limpopo', '116 Marshall St', 'Maake', '015 355 8000'),
('Ellisras Hospital', 'Limpopo', 'Munnik Ave', 'Lephalale', '014 763 2226'),
('Lebowakgomo Hospital', 'Limpopo', 'Maraba St', 'Lebowakgomo', '015 632 6921'),
('Letaba Hospital', 'Limpopo', 'Mooketsi', 'Letaba', '015 303 8200'),
('Mankweng Hospital', 'Limpopo', 'Private Bag X1117', 'Polokwane', '015 286 1000'),
('Matlala Hospital', 'Limpopo', 'Seshego B', 'Seshego', '015 223 0327'),
('Mecklenburg Hospital', 'Limpopo', 'N11', 'Burgersfort', '013 268 0114'),
('Messina Hospital', 'Limpopo', 'Schroeder St', 'Musina', '015 534 0446'),
('Mokopane Hospital', 'Limpopo', '66 Thabo Mbeki St', 'Mokopane', '015 409 1000'),
('Nkhensani Hospital', 'Limpopo', 'Off N1 Rd', 'Malamulele', '015 851 0100');

-- Mpumalanga
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Ermelo Hospital', 'Mpumalanga', 'Smuts St', 'Ermelo', '017 819 1500'),
('Evander Hospital', 'Mpumalanga', '1 Oosthuizen St', 'Evander', '017 632 8366'),
('Middelburg Provincial Hospital', 'Mpumalanga', 'Flos Rd', 'Middelburg', '013 249 0000'),
('Rob Ferreira Hospital', 'Mpumalanga', '4 Du Plooy St', 'Nelspruit', '013 741 6066'),
('Sabie Hospital', 'Mpumalanga', 'R536', 'Sabie', '013 764 1380'),
('Shongwe Hospital', 'Mpumalanga', 'R38', 'Barberton', '013 712 5000'),
('Standerton Hospital', 'Mpumalanga', 'Krishna St', 'Standerton', '017 712 9000'),
('Themba Hospital', 'Mpumalanga', 'Hospital Rd', 'Kabokweni', '013 796 1100'),
('Tintswalo Hospital', 'Mpumalanga', 'R539', 'Acornhoek', '013 795 5000'),
('Witbank Hospital', 'Mpumalanga', 'Smuts Ave', 'Witbank', '013 653 9000');

-- Northern Cape
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Calvinia Hospital', 'Northern Cape', 'De Waal St', 'Calvinia', '027 341 1481'),
('Carnarvon Hospital', 'Northern Cape', 'Kerk St', 'Carnarvon', '053 382 3060'),
('De Aar Hospital', 'Northern Cape', 'Church St', 'De Aar', '053 631 0511'),
('DFA Hospital', 'Northern Cape', 'Fritz Stockenström St', 'Upington', '054 338 7200'),
('Hartswater Hospital', 'Northern Cape', 'Paling St', 'Hartswater', '053 474 1078'),
('Kimberley Hospital', 'Northern Cape', 'Memorial Rd', 'Kimberley Central', '053 802 9111'),
('Kuruman Hospital', 'Northern Cape', 'McGregor St', 'Kuruman', '053 712 2411'),
('Prieska Hospital', 'Northern Cape', 'Barkley St', 'Prieska', '053 353 6800'),
('Upington Hospital', 'Northern Cape', 'De Waal St', 'Upington', '054 338 7200'),
('Victoria West Hospital', 'Northern Cape', 'Kruger St', 'Victoria West', '053 621 0974');

-- North West
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Brits Hospital', 'North West', 'Meyer St', 'Brits Central', '012 381 0000'),
('Klerksdorp Hospital', 'North West', '3-23 Dolf St', 'Flamwood', '018 406 4444'),
('Mafikeng Provincial Hospital', 'North West', 'Carrington Rd', 'Mafikeng', '018 384 1721'),
('Orkney Hospital', 'North West', '64 Kruger St', 'Orkney', '018 473 0601'),
('Rustenburg Hospital', 'North West', 'Kerk St', 'Rustenburg', '014 590 5000'),
('Tshepong Hospital', 'North West', 'Jourdan St', 'Klerksdorp', '018 406 4300'),
('Vryburg Hospital', 'North West', 'Hospital St', 'Vryburg', '053 927 6000'),
('Wolmaransstad Hospital', 'North West', '36 Victoria St', 'Wolmaransstad', '018 596 1700'),
('Potchefstroom Hospital', 'North West', 'Mooirivier Dr', 'Potchefstroom', '018 294 7444'),
('Christian Barnard Memorial Hospital', 'North West', 'Rochelle St', 'Brits', '012 252 8000');

-- Western Cape
INSERT INTO Hospitals (name, province, address, city, phone) VALUES
('Groote Schuur Hospital', 'Western Cape', 'Main Rd', 'Observatory', '021 404 9111'),
('Mitchell''s Plain Hospital', 'Western Cape', 'Fagan St', 'Mitchell''s Plain', '021 377 4444'),
('New Somerset Hospital', 'Western Cape', 'Beach Rd', 'Green Point', '021 402 6911'),
('Red Cross War Memorial Children''s Hospital', 'Western Cape', 'Klipfontein Rd', 'Rondebosch East', '021 658 5111'),
('Tygerberg Hospital', 'Western Cape', 'Frans Conradie Dr', 'Tygerberg', '021 938 4911'),
('Valkenberg Hospital', 'Western Cape', 'Seymour Rd', 'Valkenberg Estate', '021 440 3111'),
('Victoria Hospital', 'Western Cape', 'Gate 2', 'Wynberg', '021 799 1111'),
('Vincent Pallotti Hospital', 'Western Cape', 'Lustigan Rd', 'Pinelands', '021 506 5111'),
('Karl Bremer Hospital', 'Western Cape', 'Michaelson Rd', 'Bellville', '021 918 1911'),
('Melomed Gatesville', 'Western Cape', 'Gatesville', 'Athlone', '021 699 0933');
