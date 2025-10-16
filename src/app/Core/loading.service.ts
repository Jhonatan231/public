import { Injectable, signal, Signal } from '@angular/core';

@Injectable({ providedIn: 'root' })
export class LoadingService {
  private readonly _loading = signal(false);
  public readonly loading: Signal<boolean> = this._loading;

  private timeoutId: any;

  show() {
    if (!this._loading()) {
      this.timeoutId = setTimeout(() => this._loading.set(true), 200);
    }
  }

  hide() {
    clearTimeout(this.timeoutId);
    if (this._loading()) {
      setTimeout(() => this._loading.set(false), 2000);
    }
  }
}
