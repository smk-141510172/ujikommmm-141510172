<?php $__env->startSection('tunjangan'); ?>
    active
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<h1><center>Daftar Kategori Tunjangan</center></h1>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr class=bg-success>
				<th>No</th>
				<th>Kode Tunjangan</th>
				<th>Nama Golongan</th>
				<th>Nama Jabatan</th>
				<th>Besar Uang</th>
				<th>Status</th>
				<th>Jumlah Anak</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		<?php  $no=1;  ?>
		<tbody>
			<?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($no++); ?></td>
				<td><?php echo e($data->kode_t); ?></td>
				<td><?php echo e($data->golongan->nama_g); ?></td>
				<td><?php echo e($data->jabatan->nama_j); ?></td>
				<td><?php echo 'RP.'.number_format($data->besar_uang,2,",",".");?></td>
				<td><?php echo e($data->status); ?></td>
				<td><?php echo e($data->jumlah_anak); ?></td>
				<td>
					<a href="<?php echo e(route('tunjangan.edit',$data->id)); ?>" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					<?php echo Form::open(['method'=>'DELETE','route'=>['tunjangan.destroy',$data->id]]); ?>

					<?php echo Form::submit('Delete',['class'=>'btn btn-danger']); ?>

					<?php echo Form::close(); ?>

				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
	<a  href="<?php echo e(url('tunjangan/create')); ?>" class="btn btn-success form-control">Tambah</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>