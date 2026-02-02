<x-app-layout>
    <x-slot:metaTitle>Halaman Kalender</x-slot:metaTitle>
    <x-slot:metaDesc>Ini halaman cuma buat kalender aja</x-slot:metaDesc>
    <x-slot:title>Kalender</x-slot:title>

    <div class="space-y-6">
        <div class="flex justify-between items-center gap-4">
            <div>
                <h1 class="font-display text-3xl font-bold">Kelola Kalender</h1>
                <p class="text-gray-500">Tambah dan kelola agenda sekolah.</p>
            </div>
            <a href="{{ route('kalender.create.admin') }}" type="button"
                class="text-white bg-brand box-border border border-transparent inline-flex items-center  hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                @svg('lucide-plus', 'h-4 w-4 me-1.5')
                Tambah Agenda</a>
        </div>
        <div class="grid gap-4">
            @if (count($events) > 0)
                @foreach ($events as $e)
                    <div class="rounded-lg border border-default bg-white shadow-sm">
                        <div class="p-4 flex items-center gap-4">
                            <div class="w-14 text-center flex-shrink-0">
                                <p class="text-2xl font-bold text-blue-600">
                                    {{ \Carbon\Carbon::parse($e['start_date'])->translatedFormat('d') }}</p>
                                <p class="text-xs text-gray-500 uppercase">
                                    {{ \Carbon\Carbon::parse($e['start_date'])->translatedFormat('M') }}</p>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span
                                    class="bg-brand text-white text-xs font-bold px-2 py-1 rounded-full">{{ ucfirst($e['category']) }}</span>
                                <h3 class="font-semibold mt-1">{{ $e['title'] }}</h3>
                                <p class="text-sm text-gray-500 line-clamp-1">{{ $e['description'] }}</p>
                                @if (isset($e['end_date']))
                                    <p class="text-xs text-gray-500">
                                        s/d {{ \Carbon\Carbon::parse($e['end_date'])->translatedFormat('d M Y') }}</p>
                                @endif
                            </div>
                            <div class="flex gap-2">
                                <button type="button"
                                    class="bg-disabled box-border border border-gray-200 inline-flex items-center  hover:bg-amber-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-pencil', 'h-4 w-4')</button>
                                <button type="button"
                                    class="text-white bg-red-500 box-border border border-fg-disabled inline-flex items-center  hover:bg-red-400 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-sm p-3 focus:outline-none">
                                    @svg('lucide-trash-2', 'h-4 w-4')</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-500">Belum ada agenda.</p>
            @endif
        </div>
        {{-- <Dialog open={isDialogOpen} onOpenChange={setIsDialogOpen}>
            <DialogContent>
                <DialogHeader>
                    <DialogTitle>{editingEvent ? 'Edit Agenda' : 'Tambah Agenda'}</DialogTitle>
                </DialogHeader>
                <div class="space-y-4">
                    <div class="space-y-2"><Label>Judul *</Label><Input value={formData.title} onChange={(e)=>
                        setFormData({ ...formData, title: e.target.value })} /></div>
                    <div class="space-y-2"><Label>Kategori</Label><Select value={formData.category} onValueChange={(v)=>
                            setFormData({ ...formData, category: v as any })}><SelectTrigger>
                                <SelectValue />
                            </SelectTrigger>
                            <SelectContent class="bg-popover z-50">
                                <SelectItem value="akademik">Akademik</SelectItem>
                                <SelectItem value="kegiatan">Kegiatan</SelectItem>
                                <SelectItem value="libur">Libur</SelectItem>
                                <SelectItem value="ujian">Ujian</SelectItem>
                            </SelectContent>
                        </Select></div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2"><Label>Tanggal Mulai *</Label><Input type="date"
                                value={formData.startDate} onChange={(e)=> setFormData({ ...formData, startDate:
                            e.target.value })} /></div>
                        <div class="space-y-2"><Label>Tanggal Selesai</Label><Input type="date"
                                value={formData.endDate} onChange={(e)=> setFormData({ ...formData, endDate:
                            e.target.value })} /></div>
                    </div>
                    <div class="space-y-2"><Label>Deskripsi</Label><Textarea value={formData.description}
                            onChange={(e)=> setFormData({ ...formData, description: e.target.value })} rows={2} /></div>
          </div>
          <DialogFooter><Button variant="outline" onClick={() => setIsDialogOpen(false)}>Batal</Button><Button onClick={handleSubmit}>{editingEvent ? 'Simpan' : 'Tambah'}</Button></DialogFooter>
        </DialogContent>
      </Dialog>
      <AlertDialog open={isDeleteOpen} onOpenChange={setIsDeleteOpen}><AlertDialogContent><AlertDialogHeader><AlertDialogTitle>Hapus Agenda?</AlertDialogTitle><AlertDialogDescription>Agenda akan dihapus permanen.</AlertDialogDescription></AlertDialogHeader><AlertDialogFooter><AlertDialogCancel>Batal</AlertDialogCancel><AlertDialogAction onClick={handleDelete} class="bg-destructive text-destructive-foreground">Hapus</AlertDialogAction></AlertDialogFooter></AlertDialogContent></AlertDialog> --}}
    </div>
</x-app-layout>
