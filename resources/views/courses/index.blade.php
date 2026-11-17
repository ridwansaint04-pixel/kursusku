@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')

<style>
    :root {
        --navy: #101c32;
        --navy-light: #1b2c49;
        --emerald: #087f70;
        --gold: #d6b574;
        --bg: #f3f6fa;
        --text: #26354a;
    }

    body {
        background: var(--bg);
        font-family: 'Segoe UI', sans-serif;
    }

    .course-page {
        background: linear-gradient(135deg, #f3f6fa, #edf3f5);
        min-height: 100vh;
        padding: 35px 0 60px;
    }

    /* HERO BANNER */

    .course-banner {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 45px 40px;
        color: white;
        background:
            linear-gradient(90deg,
                rgba(12, 25, 46, .97) 0%,
                rgba(12, 40, 57, .88) 55%,
                rgba(8, 127, 112, .65) 100%),
            url('https://images.unsplash.com/photo-1518770660439-4636190af475?w=1600')
            center/cover;
        box-shadow: 0 15px 40px rgba(16, 28, 50, .17);
    }

    .course-banner::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 1px solid rgba(214,181,116,.3);
        border-radius: 50%;
        right: 8%;
        top: -130px;
    }

    .banner-content {
        position: relative;
        z-index: 2;
    }

    .banner-label {
        display: inline-block;
        background: rgba(214,181,116,.16);
        color: #f2d69e;
        border: 1px solid rgba(214,181,116,.4);
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .course-banner h1 {
        font-size: 34px;
        font-weight: 800;
        margin: 18px 0 12px;
    }

    .course-banner p {
        color: #d0dbe8;
        max-width: 490px;
        line-height: 1.8;
        margin: 0;
    }

    .banner-image {
        width: 210px;
        height: 160px;
        object-fit: cover;
        border-radius: 20px;
        border: 2px solid rgba(214,181,116,.65);
        box-shadow: 0 12px 35px rgba(0,0,0,.3);
        position: relative;
        z-index: 2;
    }

    /* STATISTICS */

    .course-stat {
        background: white;
        border: 1px solid #e8edf3;
        border-radius: 20px;
        padding: 23px;
        height: 100%;
        box-shadow: 0 6px 20px rgba(20,40,70,.045);
        transition: .3s ease;
        position: relative;
        overflow: hidden;
    }

    .course-stat:hover {
        transform: translateY(-5px);
        box-shadow: 0 13px 28px rgba(20,40,70,.10);
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 13px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 21px;
        margin-bottom: 17px;
    }

    .icon-total {
        background: #e8edff;
        color: #5065c9;
    }

    .icon-open {
        background: #dcf7ed;
        color: #07865f;
    }

    .icon-draft {
        background: #fff1d9;
        color: #c68b30;
    }

    .icon-closed {
        background: #ffe5e9;
        color: #d34d69;
    }

    .stat-label {
        color: #8290a3;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .7px;
    }

    .stat-number {
        color: var(--navy);
        font-size: 32px;
        font-weight: 800;
        margin: 6px 0;
    }

    .course-stat small {
        color: #8995a6;
    }

    /* MAIN PANEL */

    .course-panel {
        background: white;
        border: 1px solid #e8edf3;
        border-radius: 22px;
        padding: 28px;
        box-shadow: 0 8px 28px rgba(20,40,70,.05);
    }

    .panel-title {
        color: var(--navy);
        font-size: 23px;
        font-weight: 800;
    }

    .panel-subtitle {
        color: #8995a6;
        font-size: 13px;
    }

    /* BUTTONS */

    .btn-add-course {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #087f70, #12a58a);
        color: white;
        border: none;
        border-radius: 12px;
        padding: 13px 20px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(8,127,112,.2);
        transition: .25s;
    }

    .btn-add-course:hover {
        background: linear-gradient(135deg, #06685e, #087f70);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 9px 20px rgba(8,127,112,.3);
    }

    .action-btn {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid transparent;
        transition: .2s;
    }

    .btn-detail {
        background: #eaf1ff;
        color: #4165b5;
        border-color: #d8e4ff;
    }

    .btn-edit {
        background: #fff5df;
        color: #a97920;
        border-color: #f5e6c1;
    }

    .btn-delete {
        background: #fff0f1;
        color: #c34b5b;
        border-color: #f5d9dd;
        cursor: pointer;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        filter: brightness(.96);
    }

    /* TABLE */

    .course-table {
        min-width: 800px;
        border-collapse: separate;
        border-spacing: 0;
    }

    .course-table thead th {
        background: #f0f5f8;
        color: #52647b;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .5px;
        padding: 17px 14px;
        border: none;
        white-space: nowrap;
    }

    .course-table thead th:first-child {
        border-radius: 12px 0 0 12px;
    }

    .course-table thead th:last-child {
        border-radius: 0 12px 12px 0;
    }

    .course-table tbody td {
        padding: 17px 14px;
        border-bottom: 1px solid #edf0f5;
        vertical-align: middle;
        color: #536176;
        font-size: 13px;
    }

    .course-table tbody tr {
        transition: .2s;
    }

    .course-table tbody tr:hover {
        background: #f8fbfd;
    }

    .course-code {
        color: #087f70 !important;
        font-weight: 800;
    }

    .course-name {
        color: #26354a !important;
        font-weight: 700;
    }

    .course-fee {
        color: #087f70 !important;
        font-weight: 800;
        white-space: nowrap;
    }

    /* STATUS */

    .status-badge {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
    }

    .status-open {
        background: #dcf7ed;
        color: #07865f;
    }

    .status-draft {
        background: #fff1d9;
        color: #b47c1e;
    }

    .status-closed {
        background: #ffe5e9;
        color: #c34861;
    }

    @media(max-width: 768px) {
        .course-page {
            padding: 20px 0;
        }

        .course-banner {
            padding: 28px 22px;
        }

        .course-banner h1 {
            font-size: 25px;
        }

        .banner-image {
            width: 100%;
            max-width: 230px;
            height: 140px;
            margin-top: 25px;
        }

        .course-panel {
            padding: 18px;
        }

        .panel-title {
            font-size: 20px;
        }
    }
</style>

<div class="course-page">
<div class="container">

    {{-- HERO BANNER --}}
    <div class="course-banner mb-4">
        <div class="row align-items-center">
            <div class="col-md-8 banner-content">

                <span class="banner-label">
                    KURSUSKU | LEARNING MANAGEMENT SYSTEM
                </span>

                <h1>Kelola Kursus Lebih Mudah</h1>

                <p>
                    Platform pengelolaan kursus modern untuk mengatur,
                    memantau, dan mengembangkan berbagai program
                    pembelajaran secara profesional.
                </p>

            </div>

            <div class="col-md-4 text-md-end text-center">
                <img
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=600"
                    alt="Teknologi dan aktivitas IT"
                    class="banner-image"
                >
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3 col-6">
            <div class="course-stat">
                <div class="stat-icon icon-total">▦</div>
                <div class="stat-label">TOTAL KURSUS</div>
                <div class="stat-number">
                    {{ $courses->count() }}
                </div>
                <small>Seluruh program kursus</small>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="course-stat">
                <div class="stat-icon icon-open">✓</div>
                <div class="stat-label">KURSUS OPEN</div>
                <div class="stat-number">
                    {{ $courses->where('status', 'open')->count() }}
                </div>
                <small>Kursus terbuka</small>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="course-stat">
                <div class="stat-icon icon-draft">✎</div>
                <div class="stat-label">KURSUS DRAFT</div>
                <div class="stat-number">
                    {{ $courses->where('status', 'draft')->count() }}
                </div>
                <small>Kursus dalam persiapan</small>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="course-stat">
                <div class="stat-icon icon-closed">×</div>
                <div class="stat-label">KURSUS CLOSED</div>
                <div class="stat-number">
                    {{ $courses->where('status', 'closed')->count() }}
                </div>
                <small>Kursus ditutup</small>
            </div>
        </div>

    </div>

    {{-- DAFTAR KURSUS --}}
    <div class="course-panel">

        <div class="d-flex flex-wrap justify-content-between
                    align-items-center gap-3 mb-4">

            <div>
                <h3 class="panel-title mb-1">
                    Daftar Kursus
                </h3>

                <p class="panel-subtitle mb-0">
                    Kelola dan pantau seluruh data kursus KursusKu.
                </p>
            </div>

            <a href="{{ route('courses.create') }}"
               class="btn-add-course">
                <span>＋</span> Tambah Kursus
            </a>

        </div>

        @if ($courses->isEmpty())

            <div class="alert alert-info rounded-3">
                Belum ada data kursus. Silakan tambahkan kursus baru.
            </div>

        @else

        <div class="table-responsive">

            <table class="table course-table mb-0">

                <thead>
                    <tr>
                        <th>KODE</th>
                        <th>NAMA KURSUS</th>
                        <th>BIAYA</th>
                        <th>KUOTA</th>
                        <th>TANGGAL MULAI</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($courses as $course)

                    <tr>

                        <td class="course-code">
                            {{ $course->code }}
                        </td>

                        <td class="course-name">
                            {{ $course->name }}
                        </td>

                        <td class="course-fee">
                            Rp {{ number_format($course->fee, 0, ',', '.') }}
                        </td>

                        <td>{{ $course->quota }}</td>

                        <td>
                            {{ $course->start_date->format('d-m-Y') }}
                        </td>

                        <td>
                            <span class="status-badge status-{{ $course->status }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </td>

                        <td>
                            <div class="d-flex gap-2 flex-wrap">

                                <a href="{{ route('courses.show', $course) }}"
                                   class="action-btn btn-detail">
                                    Detail
                                </a>

                                <a href="{{ route('courses.edit', $course) }}"
                                   class="action-btn btn-edit">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('courses.destroy', $course) }}"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus kursus ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn btn-delete">
                                        Hapus
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @endif

    </div>

</div>
</div>

@endsection