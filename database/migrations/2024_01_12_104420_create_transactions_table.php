<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            /* bukti tf */
            $table->string('bukti_tf')->nullable();
            $table->string('bucket_url')->nullable();
            /*konfirmasi*/
            $table->boolean('confirm')->nullable();
            $table->timestamp('confirmed_at');
            /*ketika user cancel transaksi*/
            $table->boolean('cancel')->default(false);
            $table->timestamp('cancelled_at')->nullable();
            /* harga awal dan jml diskon*/
            $table->bigInteger('price');
            $table->tinyInteger('diskon')->nullable();
            /* id user */
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            /* id admin yg mengonfirmasi */
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
