<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: A4 portrait;
                margin: 0;
            }
            body {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }
            .prescription-container {
                width: 100% !important;
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                page-break-after: avoid !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #e0e0e0;
            padding: 20px;
        }
        
        .prescription-container {
            width: 210mm;
            min-height: 297mm;
            max-height: 297mm;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        
        .diagonal-stripe {
            height: 30px;
            background: linear-gradient(135deg, #17a2b8 0%, #17a2b8 35%, #0c5460 35%, #0c5460 65%, #17a2b8 65%, #17a2b8 100%);
            background-size: 100px 100%;
        }
        
        .diagonal-stripe.top {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
        }
        
        .diagonal-stripe.bottom {
            clip-path: polygon(0% 0, 100% 0, 100% 100%, 0 100%);
        }
        
        .header-section {
            padding: 25px 40px 20px 40px;
        }
        
        .rx-symbol {
            font-size: 3.5rem;
            color: #17a2b8;
            font-weight: bold;
            font-style: italic;
            margin-left: 20px;
            margin-top: 20px;
        }
        
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.04;
            pointer-events: none;
        }
        
        .watermark svg {
            width: 450px;
            height: 450px;
        }
        
        .main-content {
            flex: 1;
            display: flex;
            padding: 0 40px;
        }
        
        .left-section {
            width: 130px;
            border-right: 1px solid #dee2e6;
            padding-right: 20px;
            position: relative;
        }
        
        .right-section {
            flex: 1;
            padding-left: 30px;
            position:relative;
        }
        
        .prescription-body {
            min-height: 500px;
            outline: none;
            font-size: 0.95rem;
            line-height: 1.8;
        }
        .signature-section {
            position: absolute;
            bottom: 20px;
            right: 0;
        }
        .footer-section {
            padding: 20px 40px;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="prescription-container">
        <!-- Top Diagonal Stripe -->
        <div class="diagonal-stripe top"></div>
        
        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="doctor-info">
                    <h1 class="text-uppercase mb-1" style="color: #17a2b8; font-weight: 700; font-size: 1.4rem;">
                        Medical <span style="color: #0c5460;">Prescription</span>
                    </h1>
                    <div class="border-bottom border-3 mb-3" style="width: 260px; border-color: #17a2b8 !important;"></div>
                    
                    <h3 class="mb-1" style="color: #0c5460; font-weight: 600; font-size: 1.2rem;">Dr. Sarah Ahmed</h3>
                    <p class="text-muted mb-2" style="font-size: 0.85rem;">MBBS, MD (Medicine)</p>
                    <p class="text-muted small mb-0" style="font-size: 0.7rem; line-height: 1.4;">
                        Specialist in Internal Medicine<br>
                        BMA Reg. No: 12345 | Experience: 15 Years
                    </p>
                </div>
                
                <div class="text-center" style="margin: 0 30px;">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 65px; height: 65px; border: 3px solid #17a2b8;">
                        <svg width="35" height="35" viewBox="0 0 24 24" fill="none">
                            <path d="M12 2L12 22M2 12L22 12" stroke="#17a2b8" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>
                
                <div class="hospital-info text-end">
                    <h3 class="mb-2" style="color: #0c5460; font-weight: 700; font-size: 1.3rem;">CITY HOSPITAL</h3>
                    <p class="small text-muted mb-0" style="font-size: 0.7rem; line-height: 1.5;">
                        House #12, Road #5, Sector 10<br>
                        Uttara, Dhaka - 1230<br>
                        Phone: +880 1234-567890<br>
                        Email: info@cityhospital.com
                    </p>
                </div>
            </div>
            
            <!-- Patient Info Table -->
            <div class="table-responsive">
                <table class="table table-bordered border-secondary mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center py-2" style="color: #0c5460; font-weight: 600; font-size: 0.85rem; width: 18%;">Date:</th>
                            <th class="text-center py-2" style="color: #0c5460; font-weight: 600; font-size: 0.85rem; width: 32%;">Patient Name:</th>
                            <th class="text-center py-2" style="color: #0c5460; font-weight: 600; font-size: 0.85rem; width: 12%;">Age:</th>
                            <th class="text-center py-2" style="color: #0c5460; font-weight: 600; font-size: 0.85rem; width: 38%;">Address:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height: 40px;">
                            <td class="align-middle text-center" contenteditable="true" style="font-size: 0.85rem;">07/01/2026</td>
                            <td class="align-middle text-center" contenteditable="true" style="font-size: 0.85rem;">John Doe</td>
                            <td class="align-middle text-center" contenteditable="true" style="font-size: 0.85rem;">35</td>
                            <td class="align-middle px-2" contenteditable="true" style="font-size: 0.85rem;">Mirpur, Dhaka</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Watermark -->
        <div class="watermark">
            <svg viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="85" fill="none" stroke="currentColor" stroke-width="3"/>
                <circle cx="100" cy="100" r="65" fill="none" stroke="currentColor" stroke-width="2"/>
                <path d="M100 35 L100 165 M35 100 L165 100" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
            </svg>
        </div>
        
        <!-- Main Content Area -->
        <div class="main-content">
            <!-- Left Section with Rx -->
            <div class="left-section">
                <div class="rx-symbol">R<sub style="font-size: 2.2rem;">x</sub></div>
            </div>
            
            <!-- Right Section with Prescription -->
            <div class="right-section">
                <div contenteditable="true" class="prescription-body">
                    <!-- Prescription content goes here -->
                    <p class="mb-2"><strong>Chief Complaints:</strong></p>
                    <p class="mb-3 text-muted">Fever, headache, and body pain for 3 days</p>
                    
                    <p class="mb-2"><strong>Diagnosis:</strong></p>
                    <p class="mb-3 text-muted">Viral Fever</p>
                    
                    <p class="mb-2"><strong>Medications:</strong></p>
                    <ol class="mb-3">
                        <li class="mb-2">Tab. Paracetamol 500mg - 1+0+1 (After meal) - 5 days</li>
                        <li class="mb-2">Tab. Cetirizine 10mg - 0+0+1 (After meal) - 5 days</li>
                        <li class="mb-2">Syp. Antacid 2 TSF - 1+0+1 (Before meal) - 5 days</li>
                    </ol>
                    
                    <p class="mb-2"><strong>Advice:</strong></p>
                    <ul class="mb-3">
                        <li class="mb-1">Take adequate rest</li>
                        <li class="mb-1">Drink plenty of water</li>
                        <li class="mb-1">Follow up after 5 days if symptoms persist</li>
                        <li class="mb-1">Follow up after 5 days if symptoms persist</li>
                        <li class="mb-1">Follow up after 5 days if symptoms persist</li>
                        <li class="mb-1">Follow up after 5 days if symptoms persist</li>
                    </ul> 
                </div>
                <div class="signature-section">
                    <div class="text-end">
                        <div class="border-top border-dark d-inline-block" style="width: 200px;"></div>
                        <p class="mb-0 mt-2"><strong>Doctor's Signature</strong></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Section -->
        <div class="footer-section">
            <div class="row text-center">
                <div class="col-4">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="mb-1">
                        <path d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .948.684l1.498 4.493a1 1 0 0 1-.502 1.21l-2.257 1.13a11.042 11.042 0 0 0 5.516 5.516l1.13-2.257a1 1 0 0 1 1.21-.502l4.493 1.498a1 1 0 0 1 .684.949V19a2 2 0 0 1-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke="#17a2b8" stroke-width="2"/>
                    </svg>
                    <p class="small mb-0 text-muted" style="font-size: 0.65rem;">+880 123-456-789</p>
                    <p class="small mb-0 text-muted" style="font-size: 0.65rem;">+880 987-654-321</p>
                </div>
                <div class="col-4">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="mb-1">
                        <rect x="3" y="5" width="18" height="14" rx="2" stroke="#17a2b8" stroke-width="2"/>
                        <path d="M3 7l9 6 9-6" stroke="#17a2b8" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <p class="small mb-0 text-muted" style="font-size: 0.65rem;">doctor@cityhospital.com</p>
                    <p class="small mb-0 text-muted" style="font-size: 0.65rem;">www.cityhospital.com</p>
                </div>
                <div class="col-4">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="mb-1">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="#17a2b8" stroke-width="2"/>
                        <circle cx="12" cy="9" r="2.5" stroke="#17a2b8" stroke-width="2"/>
                    </svg>
                    <p class="small mb-0 text-muted" style="font-size: 0.65rem;">10 Street Address Here</p>
                    <p class="small mb-0 text-muted" style="font-size: 0.65rem;">Country, Region or State</p>
                </div>
            </div>
        </div>
        
        <!-- Bottom Diagonal Stripe -->
        <div class="diagonal-stripe bottom"></div>
    </div>
    
   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>