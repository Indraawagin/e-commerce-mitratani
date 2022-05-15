<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateReceivedDeliveryAndShippingStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->string('date_received')->nullable();
            $table->string('delivery'); //self-service, mitra-tani, jne, j&t, pos-indonesia;
            $table->string('shipping_status'); //TERTUNDA, DIKIRIM, SUCCESS;
            $table->string('resi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropColumn("date_received");
            $table->dropColumn("delivery");
            $table->dropColumn("shipping_status");
            $table->dropColumn('resi');
        });
    }
}
