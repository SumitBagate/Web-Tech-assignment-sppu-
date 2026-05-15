<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:output method="html" indent="yes"/>

<xsl:template match="/">
    <html>
        <head>
            <title>Employee Directory</title>
            <style>
                :root {
                    --bg-a: #f3f9f2;
                    --bg-b: #eef7ff;
                    --ink: #16324f;
                    --muted: #52708a;
                    --accent: #1f8a70;
                    --accent-dark: #14614d;
                    --card: #ffffff;
                    --line: #d8e5ee;
                    --row-even: #f8fcff;
                }

                * { box-sizing: border-box; }

                body {
                    margin: 0;
                    font-family: "Trebuchet MS", "Segoe UI", sans-serif;
                    color: var(--ink);
                    background:
                        radial-gradient(circle at 10% 10%, #d9f4e6 0%, transparent 35%),
                        radial-gradient(circle at 90% 0%, #dceeff 0%, transparent 30%),
                        linear-gradient(135deg, var(--bg-a), var(--bg-b));
                    min-height: 100vh;
                    padding: 28px 14px;
                }

                .wrap {
                    max-width: 1100px;
                    margin: 0 auto;
                }

                .hero {
                    background: linear-gradient(120deg, #ffffff, #effaf5);
                    border: 1px solid var(--line);
                    border-radius: 18px;
                    box-shadow: 0 12px 30px rgba(22, 50, 79, 0.08);
                    padding: 18px 20px;
                    margin-bottom: 16px;
                }

                .title {
                    margin: 0;
                    font-size: 30px;
                    letter-spacing: 0.4px;
                }

                .subtitle {
                    margin: 8px 0 0;
                    color: var(--muted);
                    font-size: 15px;
                }

                .metrics {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                    gap: 12px;
                    margin: 0 0 16px;
                }

                .metric {
                    background: var(--card);
                    border: 1px solid var(--line);
                    border-radius: 14px;
                    padding: 12px 14px;
                    box-shadow: 0 8px 18px rgba(22, 50, 79, 0.06);
                }

                .metric .label {
                    color: var(--muted);
                    font-size: 12px;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }

                .metric .value {
                    font-size: 24px;
                    font-weight: 700;
                    margin-top: 6px;
                    color: var(--accent-dark);
                }

                .table-card {
                    background: var(--card);
                    border-radius: 18px;
                    overflow: hidden;
                    border: 1px solid var(--line);
                    box-shadow: 0 18px 35px rgba(22, 50, 79, 0.1);
                }

                .table-scroll {
                    overflow-x: auto;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    min-width: 860px;
                }

                thead th {
                    background: linear-gradient(90deg, var(--accent), #2e9c81);
                    color: #ffffff;
                    text-align: left;
                    padding: 12px 14px;
                    font-size: 14px;
                    letter-spacing: 0.3px;
                    position: sticky;
                    top: 0;
                }

                tbody td {
                    padding: 11px 14px;
                    border-bottom: 1px solid #edf3f7;
                    font-size: 14px;
                }

                tbody tr:nth-child(even) {
                    background: var(--row-even);
                }

                tbody tr:hover {
                    background: #eaf8f2;
                    transition: background 0.2s ease;
                }

                .dept {
                    display: inline-block;
                    border-radius: 999px;
                    background: #e6f7f1;
                    color: #15664e;
                    padding: 4px 10px;
                    font-weight: 600;
                    font-size: 12px;
                }

                .salary {
                    font-weight: 700;
                    color: #0f5d97;
                }

                .mail {
                    color: #225e90;
                }

                @media (max-width: 640px) {
                    .title { font-size: 24px; }
                    .subtitle { font-size: 13px; }
                    body { padding: 16px 10px; }
                }
            </style>
        </head>
        <body>
            <div class="wrap">
                <div class="hero">
                    <h1 class="title">Employee Directory</h1>
                    <p class="subtitle">A quick view of workforce details sorted by salary.</p>
                </div>

                <div class="metrics">
                    <div class="metric">
                        <div class="label">Total Employees</div>
                        <div class="value"><xsl:value-of select="count(employees/employee)"/></div>
                    </div>
                    <div class="metric">
                        <div class="label">Highest Salary</div>
                        <div class="value">INR <xsl:value-of select="format-number(employees/employee[not(salary &lt; ../employee/salary)]/salary, '#,##0')"/></div>
                    </div>
                    <div class="metric">
                        <div class="label">Latest Join Year</div>
                        <div class="value"><xsl:value-of select="employees/employee[not(joiningYear &lt; ../employee/joiningYear)]/joiningYear"/></div>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Joining Year</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <xsl:for-each select="employees/employee">
                                    <xsl:sort select="salary" data-type="number" order="descending"/>
                                    <tr>
                                        <td><xsl:value-of select="name"/></td>
                                        <td><span class="dept"><xsl:value-of select="department"/></span></td>
                                        <td><xsl:value-of select="designation"/></td>
                                        <td class="salary">INR <xsl:value-of select="format-number(salary, '#,##0')"/></td>
                                        <td><xsl:value-of select="joiningYear"/></td>
                                        <td class="mail"><xsl:value-of select="email"/></td>
                                    </tr>
                                </xsl:for-each>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>