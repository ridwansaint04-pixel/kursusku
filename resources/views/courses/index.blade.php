@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')

<style>
    .course-page {
        background: linear-gradient(135deg, #f0fdf7 0%, #f4f7ff 55%, #eefaf8 100%);
        min-height: 100vh;
        padding: 30px 0 55px;
    }

    .course-banner {
        background: linear-gradient(120deg, #123d35, #087f70, #19a58c);
        color: white;
        border-radius: 22px;
        padding: 32px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 12px 30px rgba(18, 61, 53, .15);
    }

    .course-banner h1 {
        font-weight: 800;
        font-size: 30px;
        margin-bottom: 10px;
    }

    .course-banner p {
        color: #d9f5eb;
        max-width: 480px;
        margin-bottom: 0;
    }

    .banner-image {
        width: 190px;
        max-width: 100%;
        border-radius: 18px;
        object-fit: cover;
        position: relative;
        z-index: 1;
    }

    .course-stat {
        background: white;
        border: 1px solid #e6f0eb;
        border-radius: 17px;
        padding: 21px;
        height: 100%;
        box-shadow: 0 5px 18px rgba(20, 70, 55, .05);
    }

    .stat-label {
        color: #75857d;
        font-size: 13px;
        font-weight: 600;
    }

    .stat-number {
        color: #174d3e;
        font-size: 27px;
        font-weight: 800;
        margin-top: 7px;
    }

    .course-panel {
        background: white;
        border: 1px solid #e7eee9;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 7px 24px rgba(20, 70, 55, .05);
    }

    .btn-add-course {
        background: linear-gradient(120deg, #087f70, #16a085);
        color: white;
        border: none;
        border-radius: 11px;
        padding: 11px 19px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: .2s;
    }

    .btn-add-course:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 7px 17px rgba(8, 127, 112, .25);
    }

    .course-table {
        min-width: 750px;
    }

    .course-table thead th {
        background: #eff7f3;
        color: #285747;
        font-size: 13px;
        padding: 15px 13px;
        border-bottom: 0;
        white-space: nowrap;
    }

    .course-table tbody td {
        padding: 15px 13px;
        vertical-align: middle;
        color: #46574f;
        font-size: 14px;
    }

    .course-table tbody tr:hover {
        background: #f4fbf7;
    }

    .course-code {
        color: #087f70;
        font-weight: 700;
    }

    .course-name {
        color: #243d32;
        font-weight: 700;
    }

    .course-fee {
        color: #176b50;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
    }

    .status-open {
        background: #dcfce7;
        color: #15803d;
    }

    .status-draft {
        background: #fef3c7;
        color: #a16207;
    }

    .status-closed {
        background: #fee2e2;
        color: #b91c1c;
    }

    @media (max-width: 768px) {
        .course-banner {
            padding: 24px;
        }

        .course-banner h1 {
            font-size: 24px;
        }

        .banner-image {
            width: 120px;
            margin-top: 20px;
        }

        .course-panel {
            padding: 15px;
        }
    }
</style><div class="course-page">
    <div class="container">    {{-- Banner --}}
    <div class="course-banner mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <span class="badge rounded-pill bg-light text-success mb-3">
                    PLATFORM PEMBELAJARAN KURSUSKU
                </span>

                <h1>Kelola Kursus Lebih Mudah</h1>

                <p>
                    Temukan, kelola, dan pantau berbagai program belajar
                    untuk meningkatkan kemampuan dan pengetahuan.
                </p>
            </div>

            <div class="col-md-4 text-md-end text-center">
                <img
                    src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500"
                    alt="Ilustrasi kegiatan belajar"
                    class="banner-image"
                >
            </div>
        </div>
    </div>
{{-- Statistik --}}

<div class="row g-3 mb-4">{{-- Total Kursus --}}
<div class="col-md-3">
    <div class="course-stat">
        <div class="stat-label">TOTAL KURSUS</div>
        <div class="stat-number">{{ $courses->count() }}</div>
        <small class="text-muted">Seluruh program kursus</small>
    </div>
</div>

{{-- Kursus Open --}}
<div class="col-md-3">
    <div class="course-stat">
        <div class="stat-label">KURSUS OPEN</div>
        <div class="stat-number">
            {{ $courses->where('status', 'open')->count() }}
        </div>
        <small class="text-muted">Kursus terbuka</small>
    </div>
</div>

{{-- Kursus Draft --}}
<div class="col-md-3">
    <div class="course-stat">
        <div class="stat-label">KURSUS DRAFT</div>
        <div class="stat-number">
            {{ $courses->where('status', 'draft')->count() }}
        </div>
        <small class="text-muted">Kursus dalam persiapan</small>
    </div>
</div>

{{-- Kursus Closed --}}
<div class="col-md-3">
    <div class="course-stat">
        <div class="stat-label">KURSUS CLOSED</div>
        <div class="stat-number">
            {{ $courses->where('status', 'closed')->count() }}
        </div>
        <small class="text-muted">Kursus ditutup</small>
    </div>
</div>

</div>

    {{-- Daftar Kursus --}}
    <div class="course-panel">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1" style="color:#174d3e;">
                    Daftar Kursus
                </h3>
                <p class="text-muted mb-0">
                    Kelola dan pantau seluruh data kursus KursusKu.
                </p>
            </div>

            <a href="{{ route('courses.create') }}" class="btn-add-course">
                + Tambah Kursus
            </a>
        </div>

        @if ($courses->isEmpty())
            <div class="alert alert-info rounded-3">
                Belum ada data kursus. Silakan tambahkan kursus baru.
            </div>
        @else
            <div class="table-responsive">
                <table class="table course-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Kursus</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
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