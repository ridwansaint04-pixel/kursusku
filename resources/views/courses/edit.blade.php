@extends('layouts.app')

@section('title', 'Edit Kursus')

@section('content')

<style>
    .edit-page {
        min-height: 100vh;
        padding: 45px 0 60px;
        background:
            radial-gradient(circle at top right, #e0e7ff, transparent 35%),
            linear-gradient(135deg, #f5f7ff, #eef1f8);
        font-family: 'Segoe UI', sans-serif;
    }

    .edit-wrapper {
        max-width: 1050px;
        margin: auto;
    }

    /* BANNER */
    .edit-banner {
        position: relative;
        overflow: hidden;
        padding: 38px;
        border-radius: 24px;
        color: white;
        background: linear-gradient(
            120deg, #10172f, #252c55, #493b75
        );
        box-shadow: 0 18px 40px rgba(22,30,65,.20);
        margin-bottom: 30px;
    }

    .edit-banner::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 35px solid rgba(255,255,255,.06);
        border-radius: 50%;
        right: -65px;
        top: -110px;
    }

    .edit-label {
        display: inline-block;
        background: rgba(226,193,120,.16);
        color: #f1d79e;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 16px;
    }

    .edit-banner h1 {
        font-size: 30px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .edit-banner p {
        color: #c4cbe1;
        margin-bottom: 0;
    }

    .edit-banner-icon {
        width: 105px;
        height: 105px;
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: auto;
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.18);
        font-size: 48px;
        color: #f1d79e;
        position: relative;
        z-index: 1;
    }

    /* FORM PANEL */
    .edit-panel {
        background: #fff;
        border: 1px solid #e7e9f3;
        border-radius: 22px;
        padding: 35px;
        box-shadow: 0 12px 35px rgba(35,43,80,.08);
    }

    .edit-heading {
        color: #20294b;
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .edit-description {
        color: #858da4;
        font-size: 14px;
    }

    .edit-divider {
        border: 0;
        border-top: 1px solid #edf0f6;
        margin: 25px 0;
    }

    /* FORM INPUT */
    .edit-page .form-label {
        color: #35405f;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .edit-page .form-control,
    .edit-page .form-select {
        min-height: 48px;
        padding: 12px 15px;
        border: 1px solid #e0e4ef;
        border-radius: 11px;
        background: #fafbff;
        color: #27304d;
        font-size: 14px;
        transition: all .25s ease;
    }

    .edit-page textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .edit-page .form-control:focus,
    .edit-page .form-select:focus {
        border-color: #8b83c7;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(105,94,170,.10);
    }

    .edit-page .is-invalid {
        border-color: #dc3545;
    }

    .required-mark {
        color: #d75b70;
    }

    .edit-section-title {
        color: #9a7a42;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
        margin-bottom: 18px;
    }

    /* BUTTON */
    .edit-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .btn-update {
        border: none;
        border-radius: 12px;
        padding: 13px 24px;
        background: linear-gradient(120deg, #b58a43, #e1bd75);
        color: #201b10;
        font-size: 14px;
        font-weight: 800;
        box-shadow: 0 7px 17px rgba(181,138,67,.22);
        transition: .25s;
    }

    .btn-update:hover {
        transform: translateY(-3px);
        box-shadow: 0 11px 23px rgba(181,138,67,.32);
    }

    .btn-cancel {
        display: inline-block;
        text-decoration: none;
        text-align: center;
        border-radius: 12px;
        padding: 13px 24px;
        background: #eef0f7;
        color: #303957;
        font-size: 14px;
        font-weight: 700;
        transition: .25s;
    }

    .btn-cancel:hover {
        background: #dfe4f1;
        color: #20294b;
        transform: translateY(-2px);
    }

    @media(max-width: 768px) {
        .edit-page {
            padding: 25px 12px;
        }

        .edit-banner,
        .edit-panel {
            padding: 23px;
        }

        .edit-banner h1 {
            font-size: 24px;
        }

        .edit-banner-icon {
            width: 70px;
            height: 70px;
            font-size: 32px;
            margin: 22px 0 0;
        }
    }
</style>

<div class="edit-page">
    <div class="container edit-wrapper">

        {{-- BANNER --}}
        <div class="edit-banner">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <span class="edit-label">
                        KURSUSKU • COURSE MANAGEMENT
                    </span>

                    <h1>Edit Informasi Kursus</h1>

                    <p>
                        Perbarui informasi program pembelajaran
                        agar data kursus selalu akurat.
                    </p>
                </div>

                <div class="col-md-3">
                    <div class="edit-banner-icon">
                        ✎
                    </div>
                </div>
            </div>
        </div>

        {{-- FORM PANEL --}}
        <div class="edit-panel">

            <div>
                <h2 class="edit-heading">
                    Formulir Edit Kursus
                </h2>

                <p class="edit-description mb-0">
                    Silakan perbarui informasi kursus di bawah ini.
                    Kolom bertanda
                    <span class="required-mark">*</span>
                    wajib diisi.
                </p>
            </div>

            <hr class="edit-divider">

            <form action="{{ route('courses.update', $course) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- IDENTITAS KURSUS --}}
                <div class="edit-section-title">
                    01 — IDENTITAS KURSUS
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="code" class="form-label">
                            Kode Kursus <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            id="code"
                            name="code"
                            maxlength="20"
                            class="form-control @error('code') is-invalid @enderror"
                            value="{{ old('code', $course->code) }}"
                            required
                        >

                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">
                            Nama Kursus <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            maxlength="120"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $course->name) }}"
                            required
                        >

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">
                            Deskripsi Kursus
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="form-control @error('description') is-invalid @enderror"
                            rows="4"
                            placeholder="Jelaskan materi atau tujuan kursus..."
                        >{{ old('description', $course->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr class="edit-divider">

                {{-- INFORMASI PENDAFTARAN --}}
                <div class="edit-section-title">
                    02 — INFORMASI PENDAFTARAN
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="fee" class="form-label">
                            Biaya Kursus (Rp)
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="number"
                            id="fee"
                            name="fee"
                            min="0"
                            class="form-control @error('fee') is-invalid @enderror"
                            value="{{ old('fee', $course->fee) }}"
                            required
                        >

                        @error('fee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="quota" class="form-label">
                            Kuota Peserta
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="number"
                            id="quota"
                            name="quota"
                            min="1"
                            max="500"
                            class="form-control @error('quota') is-invalid @enderror"
                            value="{{ old('quota', $course->quota) }}"
                            required
                        >

                        @error('quota')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="start_date" class="form-label">
                            Tanggal Mulai
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date', $course->start_date ? \Carbon\Carbon::parse($course->start_date)->format('Y-m-d') : '') }}"
                            required
                        >

                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">
                            Status Kursus
                            <span class="required-mark">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required
                        >
                            <option value="draft"
                                {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="open"
                                {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>
                                Open
                            </option>

                            <option value="closed"
                                {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>
                                Closed
                            </option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr class="edit-divider">

                {{-- BUTTON --}}
                <div class="edit-actions">

                    <button type="submit" class="btn-update">
                        ✓ Simpan Perubahan
                    </button>

                    <a href="{{ route('courses.index') }}"
                       class="btn-cancel">
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>

@endsection