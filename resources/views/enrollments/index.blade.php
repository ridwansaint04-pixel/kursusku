@extends('layouts.app')

@section('title', 'Laporan Enrollment')

@section('content')

<style>
    .report-page {
        min-height: 100vh;
        padding: 45px 20px 70px;
        background:
            radial-gradient(circle at top left, rgba(190, 238, 211, .45), transparent 35%),
            radial-gradient(circle at bottom right, rgba(199, 215, 255, .45), transparent 40%),
            linear-gradient(135deg, #f5faf7, #f5f7fc);
    }

    .report-wrap {
        max-width: 1200px;
        margin: auto;
    }

    .report-heading {
        margin-bottom: 30px;
    }

    .report-badge {
        display: inline-block;
        padding: 8px 15px;
        border-radius: 50px;
        background: #e2f5eb;
        color: #18764d;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.4px;
        margin-bottom: 16px;
    }

    .report-title {
        font-size: 40px;
        font-weight: 800;
        letter-spacing: -1.3px;
        color: #183b2e;
        margin-bottom: 12px;
    }

    .report-subtitle {
        font-size: 15px;
        color: #78877e;
        line-height: 1.8;
        margin: 0;
    }

    .report-card {
        background: #ffffff;
        border: 1px solid #e7eee9;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 18px 55px rgba(29, 64, 46, .07);
    }

    .report-card-header {
        padding: 25px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
        background: linear-gradient(120deg, #f0faf4, #f4f7ff);
        border-bottom: 1px solid #edf1ee;
    }

    .report-card-header h3 {
        font-size: 18px;
        color: #254535;
        font-weight: 800;
        margin: 0 0 6px;
    }

    .report-card-header p {
        font-size: 13px;
        color: #829087;
        margin: 0;
    }

    .report-add-btn {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 12px 19px;
        border-radius: 12px;
        text-decoration: none;
        color: #fff !important;
        background: linear-gradient(135deg, #23875c, #155e40);
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 6px 17px rgba(30, 120, 78, .17);
        transition: .25s ease;
    }

    .report-add-btn:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg, #299967, #12613d);
        box-shadow: 0 10px 22px rgba(30, 120, 78, .24);
    }

    .report-table-wrap {
        overflow-x: auto;
    }

    .report-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
        min-width: 650px;
    }

    .report-table thead th {
        background: #234737;
        color: #ffffff;
        padding: 17px 22px;
        text-align: left;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .6px;
        white-space: nowrap;
        border: none;
    }

    .report-table tbody td {
        padding: 19px 22px;
        color: #53665a;
        font-size: 13px;
        border-bottom: 1px solid #edf2ee;
        vertical-align: middle;
    }

    .report-table tbody tr {
        transition: background .2s ease;
    }

    .report-table tbody tr:hover {
        background: #f5faf7;
    }

    .report-table tbody tr:last-child td {
        border-bottom: none;
    }

    .report-participant {
        font-weight: 700;
        color: #294737 !important;
    }

    .report-course {
        font-weight: 600;
        color: #387453 !important;
    }

    .report-date {
        white-space: nowrap;
        color: #738278 !important;
    }

    .report-status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 50px;
        background: #e5f5eb;
        color: #24754b;
        font-size: 11px;
        font-weight: 800;
        text-transform: capitalize;
    }

    .report-empty {
        padding: 45px 20px !important;
        text-align: center;
        color: #89968e !important;
    }

    .report-bottom {
        padding: 17px 25px;
        border-top: 1px solid #edf1ee;
        background: #fbfdfc;
        font-size: 12px;
        color: #849188;
    }

    @media(max-width: 600px) {
        .report-page {
            padding: 30px 13px 50px;
        }

        .report-title {
            font-size: 30px;
        }

        .report-card-header {
            padding: 22px 19px;
        }

        .report-add-btn {
            width: 100%;
            justify-content: center;
        }

        .report-table thead th,
        .report-table tbody td {
            padding: 15px;
        }
    }
</style>

<div class="report-page">
    <div class="report-wrap">

        <div class="report-heading">
            <div class="report-badge">✦ KURSUSKU DATA CENTER</div>

            <h1 class="report-title">Laporan Enrollment</h1>

            <p class="report-subtitle">
                Pantau data pendaftaran peserta dan program kursus
                dalam satu tampilan yang terorganisir.
            </p>
        </div>

        <div class="report-card">

            <div class="report-card-header">
                <div>
                    <h3>Data Pendaftaran Kursus</h3>
                    <p>Daftar peserta yang terhubung dengan program kursus.</p>
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="report-add-btn">
                    + Tambah Enrollment
                </a>
            </div>

            <div class="report-table-wrap">
                <table class="report-table">
                    <thead>
                        <tr>
                            <th>PARTICIPANT</th>
                            <th>COURSE</th>
                            <th>START DATE</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($enrollments as $enrollment)
                            <tr>
                                <td class="report-participant">
                                    {{ $enrollment->participant->name }}
                                </td>

                                <td class="report-course">
                                    {{ $enrollment->course->name }}
                                </td>

                                <td class="report-date">
                                    {{ \Carbon\Carbon::parse($enrollment->course->start_date)->format('d M Y') }}
                                </td>

                                <td>
                                    <span class="report-status">
                                        {{ $enrollment->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="report-empty">
                                    Belum ada data enrollment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="report-bottom">
                ✦ Data enrollment KursusKu · Relational Core
            </div>

        </div>

    </div>
</div>

@endsection