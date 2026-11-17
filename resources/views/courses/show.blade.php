@extends('layouts.app')

@section('title', 'Detail Kursus')

@section('content')

<style>
    .detail-page {
        min-height: 100vh;
        padding: 55px 0;
        background:
            radial-gradient(circle at top right, #e0e7ff 0%, transparent 35%),
            linear-gradient(135deg, #f5f7ff, #eef1f8);
        font-family: 'Segoe UI', sans-serif;
    }

    .detail-wrapper {
        max-width: 1050px;
        margin: auto;
    }

    /* HEADER */
    .detail-header {
        background: linear-gradient(120deg, #10172f, #252c55, #493b75);
        padding: 38px;
        border-radius: 24px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 18px 40px rgba(22, 30, 65, .20);
        margin-bottom: 30px;
    }

    .detail-header::after {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border: 35px solid rgba(255,255,255,.06);
        border-radius: 50%;
        right: -50px;
        top: -100px;
    }

    .detail-label {
        display: inline-block;
        background: rgba(226, 193, 120, .16);
        color: #f1d79e;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 15px;
    }

    .detail-header h2 {
        font-weight: 800;
        font-size: 30px;
        margin-bottom: 8px;
    }

    .detail-header p {
        color: #c4cbe1;
        margin: 0;
    }

    /* CARD */
    .detail-card {
        background: rgba(255,255,255,.95);
        border: 1px solid #e7e9f3;
        border-radius: 22px;
        padding: 35px;
        box-shadow: 0 12px 35px rgba(35, 43, 80, .08);
    }

    .detail-card-title {
        color: #20294b;
        font-weight: 800;
        font-size: 21px;
        margin-bottom: 25px;
    }

    /* INFORMASI */
    .detail-item {
        display: flex;
        align-items: flex-start;
        padding: 17px 18px;
        border-bottom: 1px solid #edf0f6;
        transition: .25s;
    }

    .detail-item:last-child {
        border-bottom: none;
    }

    .detail-item:hover {
        background: #f7f8ff;
        border-radius: 12px;
        padding-left: 25px;
    }

    .detail-item .detail-name {
        width: 190px;
        flex-shrink: 0;
        color: #77809a;
        font-size: 14px;
        font-weight: 600;
    }

    .detail-item .detail-value {
        color: #20294b;
        font-weight: 700;
        font-size: 15px;
    }

    .detail-fee {
        color: #a77a28 !important;
        font-size: 18px !important;
    }

    /* STATUS */
    .detail-status {
        display: inline-block;
        padding: 7px 17px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .status-open {
        color: #087b58;
        background: #d9f7eb;
    }

    .status-draft {
        color: #a46a13;
        background: #fff0cf;
    }

    .status-closed {
        color: #be3853;
        background: #ffe0e7;
    }

    /* BUTTON */
    .detail-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .btn-premium {
        display: inline-block;
        padding: 12px 23px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        transition: all .25s ease;
    }

    .btn-back {
        background: #eef0f7;
        color: #303957;
        border: 1px solid #e0e4ef;
    }

    .btn-back:hover {
        background: #dfe4f1;
        color: #20294b;
        transform: translateY(-3px);
    }

    .btn-edit {
        background: linear-gradient(120deg, #b58a43, #e1bd75);
        color: #201b10;
        box-shadow: 0 6px 15px rgba(181, 138, 67, .22);
    }

    .btn-edit:hover {
        color: #201b10;
        transform: translateY(-3px);
        box-shadow: 0 10px 22px rgba(181, 138, 67, .32);
    }

    @media(max-width: 600px) {
        .detail-page {
            padding: 25px 12px;
        }

        .detail-header,
        .detail-card {
            padding: 23px;
        }

        .detail-header h2 {
            font-size: 24px;
        }

        .detail-item {
            display: block;
        }

        .detail-item .detail-name {
            display: block;
            width: 100%;
            margin-bottom: 7px;
        }

        .detail-actions {
            justify-content: stretch;
        }

        .btn-premium {
            flex: 1;
            text-align: center;
        }
    }
</style>

<div class="detail-page">
    <div class="container detail-wrapper">

        {{-- HEADER --}}
        <div class="detail-header">
            <span class="detail-label">
                KURSUSKU • COURSE INFORMATION
            </span>

            <h2>Detail Kursus</h2>

            <p>
                Informasi lengkap program pembelajaran
                dan data kursus yang tersedia.
            </p>
        </div>

        {{-- INFORMASI KURSUS --}}
        <div class="detail-card">

            <h4 class="detail-card-title">
                Informasi Program Kursus
            </h4>

            <div class="detail-item">
                <div class="detail-name">Kode Kursus</div>
                <div class="detail-value">{{ $course->code }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-name">Nama Kursus</div>
                <div class="detail-value">{{ $course->name }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-name">Deskripsi</div>
                <div class="detail-value">{{ $course->description }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-name">Biaya Kursus</div>
                <div class="detail-value detail-fee">
                    Rp {{ number_format($course->fee, 0, ',', '.') }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-name">Kuota Peserta</div>
                <div class="detail-value">
                    {{ $course->quota }} Peserta
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-name">Tanggal Mulai</div>
                <div class="detail-value">
                    {{ $course->start_date->format('d-m-Y') }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-name">Status Kursus</div>
                <div class="detail-value">
                    <span class="detail-status status-{{ $course->status }}">
                        {{ ucfirst($course->status) }}
                    </span>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="detail-actions">

                <a href="{{ route('courses.index') }}"
                   class="btn-premium btn-back">
                    ← Kembali
                </a>

                <a href="{{ route('courses.edit', $course) }}"
                   class="btn-premium btn-edit">
                    ✎ Edit Kursus
                </a>

            </div>

        </div>
    </div>
</div>

@endsection