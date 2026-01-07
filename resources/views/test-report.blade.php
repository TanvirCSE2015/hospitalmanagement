<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Test Report</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: #f0f0f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px 0;
        }
        
        .page-container {
            width: 210mm;
            height: 297mm;
            background: white;
            margin: 20px auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }
        
        /* Diagonal stripe pattern */
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
        
        .content {
            position: relative;
            z-index: 10;
            padding: 0px 35px;
            display: flex;
            flex-direction: column;
        }
        
        /* Header Section */
        .header-section {
            padding: 25px 40px 20px 40px;
        }
        
        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            overflow-y: auto;
            padding-right: 5px;
            position:relative;
            height: 690px;
        }
        
        
        /* Section Headings */
        .section-heading {
            font-size: 13px;
            font-weight: bold;
            color: #333;
            margin-top: 15px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #00a8d8;
            padding-bottom: 8px;
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
        
        /* Test Results Table */
        .test-table {
            width: 100%;
            font-size: 11px;
            border-collapse: collapse;
            margin-bottom: 15px;
            border: 1px solid #ddd;
        }
        
        .test-table th {
            background: #f0f0f0;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #00a8d8;
            border-right: 1px solid #ddd;
        }
        
        .test-table th:last-child {
            border-right: none;
        }
        
        .test-table td {
            padding: 9px 10px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        
        .test-table td:last-child {
            border-right: none;
        }
        
        .test-table tr:nth-child(even) {
            background: #f9f9f9;
        }
        
        .test-table tr:hover {
            background: #f0f7ff;
        }
        
        .test-name {
            font-weight: 500;
        }
        
        .result-normal {
            color: green;
            font-weight: bold;
        }
        
        .result-abnormal {
            color: red;
            font-weight: bold;
        }
        
        /* Content Text */
        .content-text {
            font-size: 12px;
            color: #333;
            margin-bottom: 12px;
            line-height: 1.5;
        }
        
        .bullet-list {
            font-size: 12px;
            color: #333;
            margin-bottom: 12px;
            margin-left: 20px;
        }
        
        .bullet-list li {
            margin-bottom: 6px;
            line-height: 1.4;
        }
        
        /* Remarks Box */
        .remarks-box {
            background: #f0f7ff;
            border-left: 4px solid #00a8d8;
            padding: 12px;
            margin: 15px 0;
        }
        
        .remarks-title {
            font-weight: bold;
            color: #00a8d8;
            margin-bottom: 8px;
            font-size: 12px;
        }
        
        .remarks-text {
            font-size: 12px;
            color: #333;
            line-height: 1.5;
        }
        
        /* Signature Section */
        .signature-section {
            margin-top: 20px;
            padding-top: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            position: absolute;
            bottom: 20px;
            width:100%;
        }
        
        .signature-box {
            text-align: center;
        }
        
        .signature-line {
            border-top: 1px solid #333;
            width: 100%;
            margin-bottom: 8px;
            height: 0px;
        }
        
        .signature-name {
            font-weight: bold;
            color: #333;
            font-size: 12px;
        }
        
        /* Footer */
        .footer-section {
            padding: 20px 40px;
            border-top: 1px solid #dee2e6;
        }
        
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
            
            .page-container {
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
        
       
    </style>
</head>
<body>
    <div class="page-container">
        <!-- Diagonal Stripes -->
        <div class="diagonal-stripe top"></div>
        <!-- Header -->
         <div class="header-section">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="doctor-info">
                    <h1 class="text-uppercase mb-1" style="color: #17a2b8; font-weight: 700; font-size: 1.4rem;">
                        Medical <span style="color: #0c5460;">Test Report</span>
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
        
        
        <!-- Main Content -->
        <div class="content">
            
            <!-- Main Content Area -->
            <div class="main-content">
                <!-- Complete Blood Count -->
                <h4 class="section-heading">Complete Blood Count (CBC)</h4>
                <table class="test-table">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Result</th>
                            <th>Reference Range</th>
                            <th>Unit</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="test-name">Hemoglobin (Hb)</td>
                            <td>14.5</td>
                            <td>13.5 - 17.5</td>
                            <td>g/dL</td>
                            <td class="result-normal">Normal</td>
                        </tr>
                        <tr>
                            <td class="test-name">Red Blood Cells (RBC)</td>
                            <td>4.8</td>
                            <td>4.5 - 5.5</td>
                            <td>Million/μL</td>
                            <td class="result-normal">Normal</td>
                        </tr>
                        <tr>
                            <td class="test-name">White Blood Cells (WBC)</td>
                            <td>7.2</td>
                            <td>4.5 - 11.0</td>
                            <td>× 10³/μL</td>
                            <td class="result-normal">Normal</td>
                        </tr>
                        <tr>
                            <td class="test-name">Platelets (PLT)</td>
                            <td>245</td>
                            <td>150 - 400</td>
                            <td>× 10³/μL</td>
                            <td class="result-normal">Normal</td>
                        </tr>
                        <tr>
                            <td class="test-name">Hematocrit (HCT)</td>
                            <td>42%</td>
                            <td>40 - 50%</td>
                            <td>%</td>
                            <td class="result-normal">Normal</td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Remarks -->
                <div class="remarks-box">
                    <div class="remarks-title">Clinical Remarks:</div>
                    <div class="remarks-text">
                        All blood test results are within normal reference ranges. No abnormalities detected. Patient is in good health condition. Continue with regular follow-ups and maintain healthy lifestyle.
                    </div>
                </div>
                
                <!-- Signature -->
                <div class="signature-section">
                    <div class="signature-box">
                        <div class="signature-line"></div>
                        <div class="signature-name">Laboratory Technician</div>
                    </div>
                    <div class="signature-box">
                        <div class="signature-line"></div>
                        <div class="signature-name">Pathologist / Doctor</div>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>