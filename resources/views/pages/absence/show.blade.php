@extends('layouts.app')

@section('title', 'Absence Detail')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Absence Detail</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Absence Detail</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Absence Detail</h2>
                <p class="section-lead">
                    Informasi tentang detail izin karyawan.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Karyawan</label>
                                        <p>{{ $absence->user->name }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Telpon Karyawan</label>
                                        <p>{{ $absence->user->phone }}</p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Position</label>
                                        <p>{{ $absence->user->position }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Department</label>
                                        <p>{{ $absence->user->department }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Date absence</label>
                                        <p>{{ $absence->date_absence }}</p>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Reason</label>
                                        <p>{{ $absence->reason }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Bukti Dukung</label>
                                        @if ($absence->image)
                                            <!-- Jika image tersedia, tampilkan gambar -->
                                            <div>
                                                <img src="{{ asset('storage/absence_images/' . $absence->image) }}"
                                                    alt="Bukti Dukung" class="img-thumbnail mb-3" style="max-width: 200px;">
                                            </div>
                                        @else
                                            <!-- Jika image kosong, tampilkan teks -->
                                            <p>Tidak ada bukti dukung</p>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Is Approval</label>
                                        <p>
                                            @if ($absence->is_approved == 1)
                                                Approved
                                            @else
                                                Not Approved
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('absences.edit', $absence->id) }}" class="btn btn-primary">Edit
                                    Absence For Approve</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
